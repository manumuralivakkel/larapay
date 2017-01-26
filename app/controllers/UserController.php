<?php

                class UserController extends \BaseController {

                  

                    /**
                     * Show the form for creating a new resource.
                     *
                     * @return Response
                     */
                    public function create() {
                        // load the create form (app/views/users/create.blade.php)
                        return View::make('users.create');
                    }

                    public function login() {
                        // load the create form (app/views/users/create.blade.php)
                        return View::make('users.login');
                    }

                    public function show($id) {
                        // load the create form (app/views/users/create.blade.php)
//                        return View::make('users.login');
                        return View::make('users.dashboard');
                    }

                    public function signin() {
                        // load the create form (app/views/users/create.blade.php)

                        $email = Input::get('username');
                        $password = Input::get('password');
                        $userdata = array(
                                        'email' => $email,
                                        'password' => $password
                        );

                        // attempt to do the login
                        if (Auth::attempt($userdata)) {

                    
                            $user = DB::table('lpay_mmv_member_master')->where('email', $email)->first();
                            Session::set('uid', $user->member_id);
                            Session::set('display_name', $user->first_name." ".$user->last_name);
//                            $request->session::put('uid', $user->member_id);
                            return Redirect::to('users/dashboard');

                        } else {

                            // validation not successful, send back to form 

                            Session::flash('message', 'username or password is invalid!');
                            return Redirect::to('users/login');
                        }
                    }

                    /**
                     * Store a newly created resource in storage.
                     *
                     * @return Response
                     */
                    public function store() {
                        // validate
                        // read more on validation at http://laravel.com/docs/validation
                        $user = User::where('email', '=', Input::get('email'))->first();

                        // process the login
                        if (!empty($user)) {
                            Session::flash('message', 'Email already exists!');
                            return Redirect::to('users/create');
                        } else {
                            // store
                            $user = new User;
                            $user->first_name = Input::get('first_name');
                            $user->last_name = Input::get('last_name');
                            $user->email = Input::get('email');
                            $user->password = Hash::make(Input::get('password'));
                            $user->save();

                            Session::flash('message', 'Account created successfully ,please login to continue.');
                            return Redirect::to('users/login');
                        }
                    }

                    public function dashboard() {
                        return View::make('users.dashboard');
                    }

                    /**
                     * Remove the specified resource from storage.
                     *
                     * @param  int  $id
                     * @return Response
                     */
//                    public function destroy($id) {
//                        // delete
//                        $user = User::find($id);
//                        $user->delete();
//
//                        // redirect
//                        Session::flash('message', 'Successfully deleted the user!');
//                        return Redirect::to('users/index/' . $user->member_id);
//                    }

                    public function wallet($id) {
                        // get the user
                        $user = User::find($id);
                        // show the edit form and pass the user
                        return View::make('users.wallet')
                                                                ->with('user', $user);
//    }
                    }

                    public function logout() {
                        Auth::logout();
                        return View::make('users.login');
                    }

                }
                