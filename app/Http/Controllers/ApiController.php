<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ExerciseType;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use App\Models\Exercise;
use App\Models\ExerciseDetail;
use App\Models\MechanicalAssessment;
use App\Models\PhysicalAssessment;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserVelocity;
use App\Models\Velocity;
use App\Repositories\FileUploadRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    private $userRepository;
    private $fileUploadRepository;
    public function __construct(UserRepository $userRepository, FileUploadRepository $fileUploadRepository)
    {
        $this->userRepository = $userRepository;
        $this->fileUploadRepository = $fileUploadRepository;
    }

    public function signIn(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $date = date('Y-m-d');
            $user_id = auth()->user()->id;
            User::where('id', $user_id)->update(['last_login' => $date, 'is_online' => 1, 'last_seen' => null]);
            $user = Auth::user();
            $token = $user->createToken('api-application')->accessToken;
            $response = [
                'status' => 'success',
                'message' => 'You have signed in.',
                'data' => $user,
                'token' => $token,
            ];
            return response()->json($response, 200);
        } else {
            $error = ['message' => 'Incorrect email or password.'];
            return response()->json($error, 203);
        }
    }
    public function profile()
    {
        try {
            $user_id = auth()->user()->id;
            $user = User::where('id', $user_id)->first();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function update_profile(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'height' => 'required',
                'starting_weight' => 'required',
                'hand_type' => 'required',
                'age' => 'required',
                'school' => 'required',
                'level' => 'required',
                'user_status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            if ($request->password) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|confirmed|min:6',
                ]);
                if ($validator->fails()) {
                    $response = $validator->errors();
                    return response()->json($response, 422);
                }
            }
            $user = User::find($id);
            if ($request->hasFile('photo')) {
                // $file = $request->file('photo');
                $this->userRepository->updateProfilePhoto($user, $request->all());
            }
            $user->name = $request->name;
            $user->height = $request->height;
            $user->level = $request->level;
            $user->starting_weight = $request->starting_weight;
            $user->age = $request->age;
            $user->handedness = $request->handedeness;
            $user->school = $request->school;
            $user->email = $request->email;
            $user->save();
            $response = [
                'status' => 'success',
                'data' => $user->fresh(),
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function index_track()
    {
        try {
            $user_id  = auth()->user()->id;
            $tracks = Track::where('user_id', $user_id)->get();
            $response = [
                'status' => 'success',
                'data' => $tracks,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function save_track(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required',
                'weight' => 'required',
                'arm_pain' => 'required',
            ]);
            $user_id = auth()->user()->id;
            $track = new Track();
            $track->date = $request->date;
            $track->weight = $request->weight;
            $track->arm_pain = $request->arm_pain;
            $track->user_id = $user_id;
            $track->save();
            $response = [
                'status' => 'success',
                'data' => $track,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_track(Request $request)
    {
        try {
            Track::where('id', $request->track_id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function velocities()
    {
        try {
            if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
                $user_id = auth()->user()->id;
            } else {
                $user_id = auth()->user()->created_by;
            }
            $velocities = Velocity::where('admin_id', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $velocities,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function user_velocities()
    {
        try {
            $user_id = auth()->user()->id;
            $user_velocities = UserVelocity::where('user_id', $user_id)->with('velocity_type')->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $user_velocities,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function save_velocity(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required',
                'value' => 'required',
                'velocity_type' => 'required',
            ]);
            $velocity_type = Velocity::where('name', $request->velocity_type)->value('id');
            $key = Velocity::where('id', $velocity_type)->first('key')->key;
            $user_id = auth()->user()->id;
            $user_velocity = new UserVelocity();
            $user_velocity->user_id = $user_id;
            $user_velocity->velocity_key = $key;
            $user_velocity->velocity_id = $velocity_type;
            $user_velocity->date = $request->date;
            $user_velocity->value = $request->value;
            $user_velocity->save();
            $response = [
                'status' => 'success',
                'data' => $user_velocity,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_velocity(Request $request)
    {
        try {
            $user_velocities = UserVelocity::where('id', $request->velocity_id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function user_profile(Request $request)
    {
        return $request->file('file');
    }

    public function add_user(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'height' => 'required',
                'starting_weight' => 'required',
                'hand_type' => 'required',
                'age' => 'required',
                //'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'school' => 'required',
                'level' => 'required',
                'password' => 'required|confirmed|min:6',
                'user_status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // if ($request->file('file')) {
            //     $file = $request->file('file');
            //     $foldername = 'user/profiles/';
            //     $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('file')->extension();
            //     $file->move(public_path() . '/' . $foldername, $filename);
            //     $user->avatar = $foldername . $filename;
            // }
            $user->height = $request->height;
            $user->starting_weight = $request->starting_weight;
            $user->handedness = $request->hand_type;
            $user->age = $request->age;
            $user->school = $request->school;
            $user->level = $request->level;
            $user->status = $request->user_status;
            $user->created_by = $user_id;
            $user->role = 'user';
            $user->save();
            if ($request->hasFile('photo')) {
                $this->userRepository->updateProfilePhoto($user, $request->only('photo'));
            }
            if ($user->role == 'user') {
                $phy_assessment = PhysicalAssessment::where('user_id', $user_id)->get();
                if ($phy_assessment) {
                    foreach ($phy_assessment as $phy) {
                        $user_phy_assessment = new PhysicalAssessment();
                        $user_phy_assessment->user_id = $user->id;
                        $user_phy_assessment->name = $phy->name;
                        $user_phy_assessment->status = 0;
                        $user_phy_assessment->save();
                    }
                }
                $mach_assessment = MechanicalAssessment::where('user_id', $user_id)->get();
                if ($mach_assessment) {
                    foreach ($mach_assessment as $mach) {
                        $user_mach_assessment = new MechanicalAssessment();
                        $user_mach_assessment->user_id = $user->id;
                        $user_mach_assessment->name = $mach->name;
                        $user_mach_assessment->status = 0;
                        $user_mach_assessment->save();
                    }
                }
                $questions = Questionnaire::where('user_id', $user_id)->get();
                if ($questions) {
                    foreach ($questions as $question) {
                        $user_question = new Questionnaire();
                        $user_question->name = $question->name;
                        $user_question->user_id = $user->id;
                        $user_question->save();
                    }
                }
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function user_get()
    {
        try {
            $user_id = auth()->user()->id;
            $user_name = auth()->user()->name;
            $user = User::where('created_by', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $user,
                'user_name' => $user_name
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function user_all()
    {
        try {
            $user_id = auth()->user()->id;
            $user_name = auth()->user()->name;
            $user = User::where('created_by', $user_id)->orWhere('id', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $user,
                'user_name' => $user_name
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function update_user_save(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'height' => 'required',
                'starting_weight' => 'required',
                'hand_type' => 'required',
                'age' => 'required',
                'school' => 'required',
                'level' => 'required',
                'user_status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            if ($request->password) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|confirmed|min:6',
                ]);
                if ($validator->fails()) {
                    $response = $validator->errors();
                    return response()->json($response, 422);
                }
            }
            $user = User::find($id);
            if ($request->hasFile('photo')) {
                $this->userRepository->updateProfilePhoto($user, $request->only('photo'));
                // $file = $request->file('file');
                // $foldername = 'user/profiles/';
                // $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('file')->extension();
                // $file->move(public_path() . '/' . $foldername, $filename);
                // $user->avatar = $foldername . $filename;
            }
            if ($request->password) {
                $user->password = $request->password;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->height = $request->height;
            $user->starting_weight = $request->starting_weight;
            $user->handedness = $request->hand_type;
            $user->age = $request->age;
            $user->school = $request->school;
            $user->level = $request->level;
            $user->role = $request->role;
            $user->status = $request->user_status;
            $user->role = 'user';
            $user->save();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function user_delete($id)
    {
        try {
            $user = User::where('id', $id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function question()
    {
        try {
            $user_id = auth()->user()->id;
            $questionnaires = Questionnaire::where('user_id', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $questionnaires,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function save_question(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'question' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $question = new Questionnaire();
            $question->user_id = $user_id;
            $question->name = $request->question;
            $question->save();
            $his_user = User::where('created_by', $user_id)->where('role', 'user')->get();
            if ($his_user) {
                foreach ($his_user as $user) {
                    $user_question = new Questionnaire();
                    $user_question->user_id = $user->id;
                    $user_question->name = $request->question;
                    $user_question->save();
                }
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function delete_question($id)
    {
        try {
            Questionnaire::where('id', $id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function phyiscal()
    {
        try {
            $user_id = auth()->user()->id;
            $physical = PhysicalAssessment::where('user_id', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $physical,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function add_phyiscal(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'label' => 'required',
                // 'status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $physical = new PhysicalAssessment();
            $physical->user_id = $user_id;
            $physical->name = $request->label;
            $physical->status = 0;
            $physical->save();
            $his_users = User::where('created_by', $user_id)->where('role', 'user')->get();
            if ($his_users) {
                foreach ($his_users as $user) {
                    $user_phy_assessment = new PhysicalAssessment();
                    $user_phy_assessment->name = $request->label;
                    $user_phy_assessment->user_id = $user->id;
                    $user_phy_assessment->status = 0;
                    $user_phy_assessment->save();
                }
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function delete_phyiscal(Request $request)
    {
        try {
            $physical = PhysicalAssessment::where('id', $request->physical_id)->first();
            PhysicalAssessment::where('name', $physical->name)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function physical_update_status(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            PhysicalAssessment::where('id', $request->id)->update(array('status' => $request->status));
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function mechanical()
    {
        try {
            $user_id = auth()->user()->id;
            $mechaniacl = MechanicalAssessment::where('user_id', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $mechaniacl,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function add_mechanical(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label' => 'required',
                // 'status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $mechaniacl = new MechanicalAssessment();
            $mechaniacl->user_id = $user_id;
            $mechaniacl->name = $request->label;
            $mechaniacl->status = 0;
            $mechaniacl->save();
            $his_users = User::where('created_by', $user_id)->where('role', 'user')->get();
            if ($his_users) {
                foreach ($his_users as $user) {
                    $user_mach_assessment = new MechanicalAssessment();
                    $user_mach_assessment->name = $request->label;
                    $user_mach_assessment->user_id = $user->id;
                    $user_mach_assessment->status = 0;
                    $user_mach_assessment->save();
                }
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_mechanical(Request $request)
    {
        try {
            $mechaniacl = MechanicalAssessment::where('id', $request->mechanical_id)->first();
            MechanicalAssessment::where('name', $mechaniacl->name)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function mechanical_update_status(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            MechanicalAssessment::where('id', $request->id)->update(array('status' => $request->status));
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function user_view($id)
    {
        try {
            $user = User::where('id', $id)->WithUser()->first();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function index()
    {

        try {
            $user_id = auth()->user()->id;
            $exercises = Exercise::where('user_id', $user_id)->with("exercise_type")->get();
            $response = [
                'status' => 'success',
                'data' => $exercises,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function types()
    {

        try {
            $exercises_types = ExerciseType::latest()->get();
            $response = [
                'status' => 'success',
                'data' => $exercises_types,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function save_exercises(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'ex_type' => 'required',
                'description' => 'required',
                'title' => 'required',
                'link' => 'required',
                'sets' => 'required',
                'reps' => 'required',
                'notes' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $exercise = new Exercise();
            $exercise->name = $request->name;
            $exercise->user_id = $user_id;
            $type = ExerciseType::where("name", $request->ex_type)->value("id");
            $exercise->exercises_type_id = $type;
            $exercise->description = $request->description;
            $exercise->save();

            for ($i = 0; $i < count($request->title); $i++) {
                $exercise_detail = new ExerciseDetail();
                $exercise_detail->title = $request->title[$i];
                $exercise_detail->link = $request->link[$i];
                $exercise_detail->sets = $request->sets[$i];
                $exercise_detail->reps = $request->reps[$i];
                $exercise_detail->notes = $request->notes[$i];
                $exercise_detail->exercise_id = $exercise->id;
                $exercise_detail->save();
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function detail_exercises($id)
    {
        try {
            $exercise_detail = ExerciseDetail::where('exercise_id', $id)->get();

            $response = [
                'status' => 'success',
                'data' => $exercise_detail,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function save_edit_exercises(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'ex_type' => 'required',
                'description' => 'required',
                'title' => 'required',
                'link' => 'required',
                'sets' => 'required',
                'reps' => 'required',
                'notes' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $exercise = Exercise::find($id);
            $exercise->name = $request->name;
            $type = ExerciseType::where("name", $request->ex_type)->value("id");
            $exercise->exercises_type_id = $type;
            $exercise->description = $request->description;
            $exercise->save();
            ExerciseDetail::where('exercise_id', $id)->delete();
            for ($i = 0; $i < count($request->title); $i++) {
                $exercise_detail = new ExerciseDetail();
                $exercise_detail->title = $request->title[$i];
                $exercise_detail->link = $request->link[$i];
                $exercise_detail->sets = $request->sets[$i];
                $exercise_detail->reps = $request->reps[$i];
                $exercise_detail->notes = $request->notes[$i];
                $exercise_detail->exercise_id = $exercise->id;
                $exercise_detail->save();
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_exercise(Request $request)
    {
        try {
            Exercise::where('id', $request->exercise_id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function files($id = null)
    {

        try {
            if ($id == null || empty($id)) {
                $user_id = auth()->user()->id;
            } else {
                $u_id = User::where("name", $id)->value("id");
                $user_id = $u_id;
            }
            $files = File::where('user_id', $user_id)->get();
            $response = [
                'status' => 'success',
                'data' => $files,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function save_file(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                // 'file' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt,pdf',
                'file' => 'required',
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $id = User::where("name", $request->id)->value("id");
            $user_id = $id;
            $files = new File();
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $this->fileUploadRepository->addAttachment($request->file('file'), $files::$PATH);
                $files->file = $fileName;
                $file->name = $fileName;
                // $fileName = time() . '_' . $request->file->getClientOriginalName();
                // $file->move('uploads', $fileName);
                // $files->file = $fileName;
                $files->user_id = $user_id;
                $files->title = $request->title;
                $files->save();
            }
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_file(Request $request)
    {
        try {
            File::where('id', $request->file_id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function site_setting()
    {
        try {
            $user_id = auth()->user()->id;
            $velocities = Velocity::where('admin_id', $user_id)->get();
            $response = [
                'status' => 'success',
                'data' => $velocities,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function update_setting(Request $request)
    {
        try {
            $admin_id = auth()->user()->id;
            $weight = Velocity::where('admin_id', $admin_id)->where('key', 'weight')->update(array('name' => $request->weight_label, 'status' => $request->weight));
            $arm_pain = Velocity::where('admin_id', $admin_id)->where('key', 'arm_pain')->update(array('name' => $request->arm_pain_label, 'status' => $request->arm_pain));
            $pull_down_velocity = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_velocity')->update(array('name' => $request->pull_down_velocity_label, 'status' => $request->pull_down_velocity));
            $mound_throws_velocity = Velocity::where('admin_id', $admin_id)->where('key', 'mound_throws_velocity')->update(array('name' => $request->mound_throws_velocity_label, 'status' => $request->mound_throws_velocity));
            $pull_down_3 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_3')->update(array('name' => $request->pull_down_3_label, 'status' => $request->pull_down_3));
            $pull_down_4 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_4')->update(array('name' => $request->pull_down_4_label, 'status' => $request->pull_down_4));
            $pull_down_5 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_5')->update(array('name' => $request->pull_down_5_label, 'status' => $request->pull_down_5));
            $pull_down_6 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_6')->update(array('name' => $request->pull_down_6_label, 'status' => $request->pull_down_6));
            $pull_down_7 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_7')->update(array('name' => $request->pull_down_7_label, 'status' => $request->pull_down_7));
            $long_toss_distance_label = Velocity::where('admin_id', $admin_id)->where('key', 'long_toss_distance')->update(array('name' => $request->long_toss_distance_label, 'status' => $request->long_toss_distance));
            $pylo_7 = Velocity::where('admin_id', $admin_id)->where('key', 'pylo_7')->update(array('name' => $request->pylo_7_label, 'status' => $request->pylo_7));
            $pylo_5 = Velocity::where('admin_id', $admin_id)->where('key', 'pylo_5')->update(array('name' => $request->pylo_5_label, 'status' => $request->pylo_5));
            $pylo_3 = Velocity::where('admin_id', $admin_id)->where('key', 'pylo_3')->update(array('name' => $request->pylo_3_label, 'status' => $request->pylo_3));
            $bench = Velocity::where('admin_id', $admin_id)->where('key', 'bench')->update(array('name' => $request->bench_label, 'status' => $request->bench));
            $squat = Velocity::where('admin_id', $admin_id)->where('key', 'squat')->update(array('name' => $request->squat_label, 'status' => $request->squat));
            $deadlift = Velocity::where('admin_id', $admin_id)->where('key', 'deadlift')->update(array('name' => $request->deadlift_label, 'status' => $request->deadlift));
            $vertical_jump = Velocity::where('admin_id', $admin_id)->where('key', 'vertical_jump')->update(array('name' => $request->vertical_jump_label, 'status' => $request->vertical_jump));
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function leaderboard()
    {
        try {
            $user_id = auth()->user()->id;
            if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
                $velocities = User::where('created_by', $user_id)->with('uservelocity')->get();
                $velocity_value = [];
                $velocity_value_all = [];
                $j = -1;
                foreach ($velocities as $velocity) {
                    $j++;
                    $velocity_value['name'] = $velocity->name;
                    if (isset($velocity->uservelocity[0]->id)) {
                        if ($velocity->uservelocity[$j]->id) {
                            $velocity_value['weight'] = $velocity->uservelocity->where('velocity_key', 'weight')->max('value') ?? 0;
                            $velocity_value['arm_pain'] = $velocity->uservelocity->where('velocity_key', 'arm_pain')->max('value') ?? 0;
                            $velocity_value['pull_down_velocity'] = $velocity->uservelocity->where('velocity_key', 'pull_down_velocity')->max('value') ?? 0;
                            $velocity_value['pull_down_3'] = $velocity->uservelocity->where('velocity_key', 'pull_down_3')->max('value') ?? 0;
                            $velocity_value['pull_down_4'] = $velocity->uservelocity->where('velocity_key', 'pull_down_4')->max('value') ?? 0;
                            $velocity_value['pull_down_5'] = $velocity->uservelocity->where('velocity_key', 'pull_down_5')->max('value') ?? 0;
                            $velocity_value['pull_down_6'] = $velocity->uservelocity->where('velocity_key', 'pull_down_6')->max('value') ?? 0;
                            $velocity_value['pull_down_7'] = $velocity->uservelocity->where('velocity_key', 'pull_down_7')->max('value') ?? 0;
                            $velocity_value['mound_throws_velocity'] = $velocity->uservelocity->where('velocity_key', 'mound_throws_velocity')->max('value') ?? 0;
                            $velocity_value['long_toss_distance'] = $velocity->uservelocity->where('velocity_key', 'long_toss_distance')->max('value') ?? 0;
                            $velocity_value['pylo_7'] = $velocity->uservelocity->where('velocity_key', 'pylo_7')->max('value') ?? 0;
                            $velocity_value['pylo_5'] = $velocity->uservelocity->where('velocity_key', 'pylo_5')->max('value') ?? 0;
                            $velocity_value['pylo_3'] = $velocity->uservelocity->where('velocity_key', 'pylo_3')->max('value') ?? 0;
                            $velocity_value['bench'] = $velocity->uservelocity->where('velocity_key', 'bench')->max('value') ?? 0;
                            $velocity_value['squat'] = $velocity->uservelocity->where('velocity_key', 'squat')->max('value') ?? 0;
                            $velocity_value['deadlift'] = $velocity->uservelocity->where('velocity_key', 'deadlift')->max('value') ?? 0;
                            $velocity_value['vertical_jump'] = $velocity->uservelocity->where('velocity_key', 'vertical_jump')->value('value') ?? 0;
                        } else {
                            $velocity_value['weight'] = 0;
                            $velocity_value['arm_pain'] = 0;
                            $velocity_value['pull_down_velocity'] = 0;
                            $velocity_value['pull_down_3'] = 0;
                            $velocity_value['pull_down_4'] = 0;
                            $velocity_value['pull_down_5'] = 0;
                            $velocity_value['pull_down_6'] = 0;
                            $velocity_value['pull_down_7'] = 0;
                            $velocity_value['mound_throws_velocity'] = 0;
                            $velocity_value['long_toss_distance'] = 0;
                            $velocity_value['pylo_5'] = 0;
                            $velocity_value['pylo_7'] = 0;
                            $velocity_value['pylo_3'] = 0;
                            $velocity_value['bench'] = 0;
                            $velocity_value['squat'] = 0;
                            $velocity_value['deadlift'] = 0;
                            $velocity_value['vertical_jump'] = 0;
                        }
                    } else {
                        $velocity_value['weight'] = 0;
                        $velocity_value['arm_pain'] = 0;
                        $velocity_value['pull_down_velocity'] = 0;
                        $velocity_value['pull_down_3'] = 0;
                        $velocity_value['pull_down_4'] = 0;
                        $velocity_value['pull_down_5'] = 0;
                        $velocity_value['pull_down_6'] = 0;
                        $velocity_value['pull_down_7'] = 0;
                        $velocity_value['mound_throws_velocity'] = 0;
                        $velocity_value['long_toss_distance'] = 0;
                        $velocity_value['pylo_5'] = 0;
                        $velocity_value['pylo_7'] = 0;
                        $velocity_value['pylo_3'] = 0;
                        $velocity_value['bench'] = 0;
                        $velocity_value['squat'] = 0;
                        $velocity_value['deadlift'] = 0;
                        $velocity_value['vertical_jump'] = 0;
                    }
                    $velocity_value_all[] = $velocity_value;
                }
                $velocity_names = Velocity::where('admin_id', $user_id)->get();
            } else {
                $velocities = User::where('id', $user_id)->with('uservelocity')->get();
                $velocity_value = [];
                $velocity_value_all = [];
                $j = -1;
                foreach ($velocities as $velocity) {
                    $j++;
                    $velocity_value['name'] = $velocity->name;
                    if (isset($velocity->uservelocity[0]->id)) {
                        if ($velocity->uservelocity[$j]->id) {
                            $velocity_value['weight'] = $velocity->uservelocity->where('velocity_key', 'weight')->max('value') ?? 0;
                            $velocity_value['arm_pain'] = $velocity->uservelocity->where('velocity_key', 'arm_pain')->max('value') ?? 0;
                            $velocity_value['pull_down_velocity'] = $velocity->uservelocity->where('velocity_key', 'pull_down_velocity')->max('value') ?? 0;
                            $velocity_value['pull_down_3'] = $velocity->uservelocity->where('velocity_key', 'pull_down_3')->max('value') ?? 0;
                            $velocity_value['pull_down_4'] = $velocity->uservelocity->where('velocity_key', 'pull_down_4')->max('value') ?? 0;
                            $velocity_value['pull_down_5'] = $velocity->uservelocity->where('velocity_key', 'pull_down_5')->max('value') ?? 0;
                            $velocity_value['pull_down_6'] = $velocity->uservelocity->where('velocity_key', 'pull_down_6')->max('value') ?? 0;
                            $velocity_value['pull_down_7'] = $velocity->uservelocity->where('velocity_key', 'pull_down_7')->max('value') ?? 0;
                            $velocity_value['mound_throws_velocity'] = $velocity->uservelocity->where('velocity_key', 'mound_throws_velocity')->max('value') ?? 0;
                            $velocity_value['long_toss_distance'] = $velocity->uservelocity->where('velocity_key', 'long_toss_distance')->max('value') ?? 0;
                            $velocity_value['pylo_7'] = $velocity->uservelocity->where('velocity_key', 'pylo_7')->max('value') ?? 0;
                            $velocity_value['pylo_5'] = $velocity->uservelocity->where('velocity_key', 'pylo_5')->max('value') ?? 0;
                            $velocity_value['pylo_3'] = $velocity->uservelocity->where('velocity_key', 'pylo_3')->max('value') ?? 0;
                            $velocity_value['bench'] = $velocity->uservelocity->where('velocity_key', 'bench')->max('value') ?? 0;
                            $velocity_value['squat'] = $velocity->uservelocity->where('velocity_key', 'squat')->max('value') ?? 0;
                            $velocity_value['deadlift'] = $velocity->uservelocity->where('velocity_key', 'deadlift')->max('value') ?? 0;
                            $velocity_value['vertical_jump'] = $velocity->uservelocity->where('velocity_key', 'vertical_jump')->value('value') ?? 0;
                        } else {
                            $velocity_value['weight'] = 0;
                            $velocity_value['arm_pain'] = 0;
                            $velocity_value['pull_down_velocity'] = 0;
                            $velocity_value['pull_down_3'] = 0;
                            $velocity_value['pull_down_4'] = 0;
                            $velocity_value['pull_down_5'] = 0;
                            $velocity_value['pull_down_6'] = 0;
                            $velocity_value['pull_down_7'] = 0;
                            $velocity_value['mound_throws_velocity'] = 0;
                            $velocity_value['long_toss_distance'] = 0;
                            $velocity_value['pylo_5'] = 0;
                            $velocity_value['pylo_7'] = 0;
                            $velocity_value['pylo_3'] = 0;
                            $velocity_value['bench'] = 0;
                            $velocity_value['squat'] = 0;
                            $velocity_value['deadlift'] = 0;
                            $velocity_value['vertical_jump'] = 0;
                        }
                    } else {
                        $velocity_value['weight'] = 0;
                        $velocity_value['arm_pain'] = 0;
                        $velocity_value['pull_down_velocity'] = 0;
                        $velocity_value['pull_down_3'] = 0;
                        $velocity_value['pull_down_4'] = 0;
                        $velocity_value['pull_down_5'] = 0;
                        $velocity_value['pull_down_6'] = 0;
                        $velocity_value['pull_down_7'] = 0;
                        $velocity_value['mound_throws_velocity'] = 0;
                        $velocity_value['long_toss_distance'] = 0;
                        $velocity_value['pylo_5'] = 0;
                        $velocity_value['pylo_7'] = 0;
                        $velocity_value['pylo_3'] = 0;
                        $velocity_value['bench'] = 0;
                        $velocity_value['squat'] = 0;
                        $velocity_value['deadlift'] = 0;
                        $velocity_value['vertical_jump'] = 0;
                    }
                    $velocity_value_all[] = $velocity_value;
                }
                $velocity_names = Velocity::where('admin_id', auth()->user()->created_by)->get();
            }
            $response = [
                'status' => 'success',
                'uservelocity' =>  $velocity_value_all,
                'velocitynames' => $velocity_names,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function graph(Request $request)
    {
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
            $user_id = auth()->user()->id;
        } else {
            $user_id = auth()->user()->created_by;
        }
        // $velocities = Velocity::where('admin_id', $user_id)->where('status', '1')->get();
        $graphs = Velocity::where('admin_id', $user_id)->get();
        $users = User::where('created_by', $user_id)->latest()->get();

        if ($request->start_date != null && $request->end_date != null && $request->name != null) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $timestamp_start = strtotime($start_date);
            $timestamp_end = strtotime($end_date);
            $start_date = date('d-m-Y', $timestamp_start);
            $end_date = date('d-m-Y', $timestamp_end);
            $mounth = date('m', $timestamp_start);
            $year = date('Y', $timestamp_start);
            $day = date('d', $timestamp_start);
            $diff = strtotime($start_date) - strtotime($end_date);
            $dif = abs(round($diff / 86400));
            $user_id = User::where('name', $request->name)->value('id');
        } else {
            $year = date('Y');
            $mounth = date('m');
            $dif = 30;
            $user_id = auth()->user()->id;
            $day = 1;
        }

        $graph = [];
        $graph_all = [];
        for ($i = 1; $i <= $dif; $i++) {
            if ($day > 30) {
                $day = 1;
                $mounth++;
            }
            if ($mounth > 12) {
                $mounth = 1;
                $year++;
            }
            $weight['date'] = $year . '/' . $mounth . '/' . $day;
            $arm_pain['date'] = $year . '/' . $mounth . '/' . $day;
            $pull_down_velocity['date'] = $year . '/' . $mounth . '/' . $day;
            $mount_throw_velocit['date'] = $year . '/' . $mounth . '/' . $day;
            $pull_down_3['date'] = $year . '/' . $mounth . '/' . $day;
            $pull_down_4['date'] = $year . '/' . $mounth . '/' . $day;
            $pull_down_5['date'] = $year . '/' . $mounth . '/' . $day;
            $pull_down_6['date'] = $year . '/' . $mounth . '/' . $day;
            $pull_down_7['date'] = $year . '/' . $mounth . '/' . $day;
            $long_toss_distance['date'] = $year . '/' . $mounth . '/' . $day;
            $pylo7['date'] = $year . '/' . $mounth . '/' . $day;
            $pylo5['date'] = $year . '/' . $mounth . '/' . $day;
            $pylo3['date'] = $year . '/' . $mounth . '/' . $day;
            $bench['date'] = $year . '/' . $mounth . '/' . $day;
            $squat['date'] = $year . '/' . $mounth . '/' . $day;
            $deadlift['date'] = $year . '/' . $mounth . '/' . $day;
            $vertical_jump['date'] = $year . '/' . $mounth . '/' . $day;
            $weight['weight'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'weight')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $arm_pain['arm_pain'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'arm_pain')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pull_down_velocity['pull_down_velocity'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pull_down_velocity')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $mount_throw_velocit['mount_throw_velocit'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'mound_throws_velocity')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pull_down_3['pull_down_3'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pull_down_3')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pull_down_4['pull_down_4'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pull_down_4')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pull_down_5['pull_down_5'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pull_down_5')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pull_down_6['pull_down_6'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pull_down_6')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pull_down_7['pull_down_7'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pull_down_7')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $long_toss_distance['long_toss_distance'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'long_toss_distance')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pylo7['pylo7'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pylo_7')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pylo5['pylo5'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pylo_5')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $bench['bench'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'bench')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $pylo3['pylo3'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'pylo_3')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $squat['squat'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'squat')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $deadlift['deadlift'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'deadlift')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $vertical_jump['vertical_jump'] = UserVelocity::where('user_id', $user_id)->where('velocity_key', 'vertical_jump')->whereDay('date', $day)->whereMonth('date', $mounth)->sum('value');
            $weight_all[] = $weight;
            $arm_pain_all[] = $arm_pain;
            $pull_down_velocity_all[] = $pull_down_velocity;
            $mount_throw_velocit_all[] = $mount_throw_velocit;
            $pull_down_3_all[] = $pull_down_3;
            $pull_down_4_all[] = $pull_down_4;
            $pull_down_5_all[] = $pull_down_5;
            $pull_down_6_all[] = $pull_down_6;
            $pull_down_7_all[] = $pull_down_7;
            $long_toss_distance_all[] = $long_toss_distance;
            $pylo7_all[] = $pylo7;
            $pylo5_all[] = $pylo5;
            $bench_all[] = $bench;
            $pylo3_all[] = $pylo3;
            $squat_all[] = $squat;
            $deadlift_all[] = $deadlift;
            $vertical_jump_all[] = $vertical_jump;
            $day++;
        }
        $response = [
            'status' => 'success',
            'graphs' => $graphs,
            'weight' =>  $weight_all,
            'arm_pain' => $arm_pain_all,
            'pull_down_velocity' => $pull_down_velocity_all,
            'mount_throw_velocit' => $mount_throw_velocit_all,
            'pull_down_3' => $pull_down_3_all,
            'pull_down_4' => $pull_down_4_all,
            'pull_down_5' => $pull_down_5_all,
            'pull_down_6' => $pull_down_6_all,
            'pull_down_7' => $pull_down_7_all,
            'long_toss_distance' => $long_toss_distance_all,
            'pylo7' => $pylo7_all,
            'pylo5' => $pylo5_all,
            'bench_all' => $bench_all,
            'pylo3' => $pylo3_all,
            'squat' => $squat_all,
            'deadlift' => $deadlift_all,
            'vertical_jump' => $vertical_jump_all
        ];
        return response()->json($response, 200);
    }
    //scdedule
    public function users()
    {
        try {

            $users = User::where('created_by', auth()->id())->get(['id', 'name'])
                ->prepend(['id' => auth()->id(), 'name' => 'Me'])->toArray();
            $response = [
                'status' => 'success',
                'data' => $users,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function shadule_calender(Request $request)
    {
        try {
            if ($request->id == null || "" || empty($request->id)) {
                $schedule = Schedule::where('user_id', auth()->id())->first('events')->events ?? '[]';
            } else {
                $schedule =  Schedule::where('user_id', $request->id)->first('events')->events ?? '[]';
            }
            if ($schedule) {
                $js_schedule = json_decode($schedule);
            } else {
                $js_schedule = [];
            }
            $users = User::where('created_by', auth()->id())->get(['id', 'name'])
                ->prepend(['id' => auth()->id(), 'name' => 'Me'])->toArray();
            $response = [
                'status' => 'success',
                'schedule' => $js_schedule,
                'users' => $users,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function exercise_user()
    {
        try {
            $users = User::where('created_by', auth()->id())->get(['id', 'name'])
                ->prepend(['id' => auth()->id(), 'name' => 'Me'])->toArray();
            $response = [
                'status' => 'success',
                'users' => $users,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function schedule_update(Request $request)
    {
        // $event[] = $request->events;
        try {
            $events = Schedule::updateOrCreate(
                ['user_id' => $request->id],
                [
                    'events' => $request->events,
                ]
            );
            $response = [
                'status' => 'success',
                // 'date' =>  $tasks,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function schedule_view($id)
    {
        try {
            $exercise = Exercise::where('id', $id)->with('excercise_detail')->get();
            $response = [
                'status' => 'success',
                'exercise' => $exercise,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function update_exercise_strength(ExerciseDetail $exercise_detail, Request $request)
    {
        try {
            $exercise_detail->strength = $request->strength;
            $exercise_detail->save();
            $response = [
                'status' => 'success',
                'exercise' => $exercise_detail,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
}