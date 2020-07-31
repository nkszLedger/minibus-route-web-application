<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\UserRegistered;
use Spatie\Permission\Models\Role;
use Laravel\Passport\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the path the user should be redirected to.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        return route('auth.login');
    }
    
    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    private static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users = User::orderBy('id','desc')->get();

        return view('admin.users.index',
                        compact(['all_users']));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_roles = Role::all();

        return view('admin.users.create', 
                    compact('all_roles'));
    }

    private function sendmail($user)
    {
        Mail::to($user->email)
                ->send(new UserRegistered($user));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('email'),
                'role' => $request->get('role')
            ],
            [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:users,email',
                'role' => 'required'
            ]
        );  

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }

        $all_roles = Role::all();

        $user = new User();
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->remember_token = true;
        $user->password = Hash::make( $this->randomPassword() );
        $user->assignRole( $request->get('role') );
        
        if( $user->save() )
        {
            $oauth_client = new Client();
            $oauth_client->user_id = $user->id;
            $oauth_client->name = 'Minibus Password Grant Client';
            $oauth_client->secret = base64_encode(hash_hmac('sha256',
                                    $user->password, 'secret', true));

            $oauth_client->redirect = 'http://ptrms-test.csir.co.za';
            $oauth_client->personal_access_client = false;
            $oauth_client->password_client = true;
            $oauth_client->revoked = false;
            $oauth_client->save();

            //Create Password Reset Token
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $this->quickRandom(60),
                'created_at' => now()
            ]);
            Mail::to($user)->send(new UserRegistered($user));

            return $this->index();

        }
        else
        {
            $errors = 'Failed to create user. Please try again';
            return view('admin.users.create', 
                    compact('all_roles', 'errors'));
        }



    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')
                    ->findOrFail($id);

        return view('admin.users.show',compact('user'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $all_roles = Role::all();

        return view('admin.users.edit', 
                    compact('user','all_roles'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('email'),
                'role' => $request->get('role')
            ],
            [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'role' => 'required'
            ]
        );  

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }
    
        $user = User::find($id);
        DB::table('model_has_roles')
            ->where('model_id',$id)
            ->delete();
            
        $user->assignRole($request->get('role'));

        $update = array(
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email')
        );

        if( $user->update($update) )
        {
            return $this->index();
        }
        else
        { 
            $errors = 'User could not be updated';
            return back()->withErrors($errors)
                        ->withInput();
        }

    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        /* find user */
        // $user = User::find($id);

        // /* revoke user from oauth */
        // $client = Client::where('user_id', $user->id);
        // $client->revoked = true;
        // $client->update();

        // /* trash user */
        // $user->delete();

        // return $this->index();

        dd('hey');

    }
    /**
     * Activates the specified deleted resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        dd('restored');
    }

}

/*
<?php

namespace App\Http\Controllers\DataCapturer;
use App\User;
use App\City;
use App\Employee;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
 
    public function index()
    {
        $all_cities = City::all();
        $all_roles = Role::all();
        $all_employees = Employee::with(['city'])->orderBy('id','desc')->get();

        return view('datacapturer.employees.index', compact(['all_cities',
                                                      'all_roles', 
                                                      'all_employees']));
    }

    public function create()
    {
        $all_cities = City::all();
        $all_roles = Role::all();

        return view('datacapturer.employees.create', compact(['all_cities', 'all_roles']));
    }
    public function store(Request $request)
    {
        $employee = new Employee();
        
        $employee->name = $request->get('name');
        $employee->surname = $request->get('surname');
        $employee->id_number = $request->get('id_number');
        $employee->employee_id = $request->get('employee_number');
        $employee->phone_number = $request->get('phone_number');
        $employee->address_line = $request->get('address_line');
        $employee->postal_code = $request->get('postal_code');
        $employee->city_id = $request->get('city');

        if( $employee->save() )
        {
            $user = new User();
            $temporal_password = $this->randomPassword();

            $user->email = $request->get('email');
            $user->employee_id = $employee->id;
            $user->password = bcrypt($temporal_password);

            if(!empty($request->get('group'))) {

                foreach ((array)$request->get('group') as $value) 
                {
                    switch($value)
                    {
                        case Role::where('id', 1)->get()[0]['id']:
                            $role = Role::where('id', 1);
                            $user->assignRole([$role->id]);
                        break;

                        case Role::where('id', 2)->get()[0]['id']:
                            $role = Role::where('id', 2);
                            $user->assignRole([$role->id]);
                        break;
                    }
                }
                $user->save();
            }
        }
    }

    public function edit($id)
    {
        $employee = Employee::with(['city'])->findOrFail($id);
        $user = User::where('employee_id', $employee->id)->get();

        $all_roles = Role::all();
        $all_cities = City::all();

        return view('datacapturer.employees.create', compact(['all_cities',
                                                        'all_roles',
                                                        'employee',
                                                        'user'
                                                        ]));
    }

    public function update(Request $request, $id)
    {
        $employee_form_id = $request->get('id');

        if($employee_form_id !== null) 
        {
            $employee = Employee::where('id', $employee_form_id)->get();
        }
    }

    public function destroy($id)
    {
        //
    }
}

*/