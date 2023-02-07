<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Course;
use App\Models\FinancialYear;
use App\Models\Institution;
use App\Models\SubCounty;
use App\Models\User;
use App\Models\Ward;
use Gate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;


class ApplicationController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
       if (check_if_system_is_open()) {
        return view('locked');
       }
        $id = Auth::id();
        $county = 0;
        $roles = Auth::user()->roles()->get();
        $title = "";//$role->title;
        foreach($roles as $role) {
            $title = $role->title;
        }
        
        
        $s_counties = SubCounty::all();
        $ward = Ward::all();
        
        foreach($s_counties as $s_county) {
            if ($title == $s_county->name) {
               
                     
                
                $con = $s_county->name. " Constituency";
              
            } 
        }
        
        if ($request->ajax()) {
          
           // $query = Application::with(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course'])->select(sprintf('%s.*', (new Application())->table));
            
            if ($title == 'Admin') {
                $query = Application::with(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course'])->select(sprintf('%s.*', (new Application())->table));
               
            } 
           
            foreach($s_counties as $s_county) {
                if ($title == $s_county->name) {
                    $sid = $s_county->id;
                    $query = Application::with(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course'])
                         ->where('sub_county_id', '=', $sid)
                        ->where('cdf_applied','=', 1)
                        ->select(sprintf('%s.*', (new Application())->table));        
                    
                    $con = $s_county->name. " Constituency";
                  
                } 
            }
            
           
            if ($title == 'User') {
                    $query = Application::with(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course'])
                    ->where('user_id', '=', $id)
                    
                    ->select(sprintf('%s.*', (new Application())->table));
                  
             }
            foreach($ward as $wa) {
            if ($title == $wa->name) {
                $wid = $wa->id;
                $query = Application::with(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course'])
                ->where('ward_id', '=', $wid)
                ->where('county_applied','=',1)
                ->select(sprintf('%s.*', (new Application())->table));

               
            }
           } 
               

            $table = Datatables::of($query);//->removeColumn('county_applied','county_amount_awarded','recommended_for_county');

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'application_show';
                $editGate = 'application_edit';
                $deleteGate = 'application_delete';
                $crudRoutePart = 'applications';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });
           
        

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('user.name', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->name) : '';
            });
            $table->editColumn('user.email', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->email) : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                $test  = result();
                if ($test == 1) {
                    return "This is a test for everyone";
                }
                else {
                return $row->last_name ? $row->last_name : '';
                }
            });
            $table->editColumn('other_names', function ($row) {
                return $row->other_names ? $row->other_names : '';
            });
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : '';
            });
            $table->editColumn('sub_location', function ($row) {
                return $row->sub_location ? $row->sub_location : '';
            });
            $table->editColumn('tel_no', function ($row) {
                return $row->tel_no ? $row->tel_no : '';
            });
            $table->editColumn('village', function ($row) {
                return $row->village ? $row->village : '';
            });
            $table->editColumn('institution', function ($row) {
                return $row->institution ? $row->institution : '';
            });
            $table->editColumn('admission_number', function ($row) {
                return $row->admission_number ? $row->admission_number : '';
            });
            $table->editColumn('form_year', function ($row) {
                return $row->form_year ? $row->form_year : '';
            });
            $table->editColumn('disability', function ($row) {
                return $row->disability ? Application::DISABILITY_RADIO[$row->disability] : '';
            });
            $table->editColumn('specify_disability', function ($row) {
                return $row->specify_disability ? $row->specify_disability : '';
            });
            $table->editColumn('received_bursary_before', function ($row) {
                return $row->received_bursary_before ? Application::RECEIVED_BURSARY_BEFORE_RADIO[$row->received_bursary_before] : '';
            });
            $table->editColumn('both_parents_alive', function ($row) {
                return $row->both_parents_alive ? Application::BOTH_PARENTS_ALIVE_RADIO[$row->both_parents_alive] : '';
            });
            $table->editColumn('fathers_name', function ($row) {
                return $row->fathers_name ? $row->fathers_name : '';
            });
            $table->editColumn('fathers_occupation', function ($row) {
                return $row->fathers_occupation ? $row->fathers_occupation : '';
            });
            $table->editColumn('mothers_name', function ($row) {
                return $row->mothers_name ? $row->mothers_name : '';
            });
            $table->editColumn('mothers_occupation', function ($row) {
                return $row->mothers_occupation ? $row->mothers_occupation : '';
            });
            $table->editColumn('fathers_tel_no', function ($row) {
                return $row->fathers_tel_no ? $row->fathers_tel_no : '';
            });
            $table->editColumn('mothers_tel_no', function ($row) {
                return $row->mothers_tel_no ? $row->mothers_tel_no : '';
            });
            $table->editColumn('total_fees_payable', function ($row) {
                return $row->total_fees_payable ? $row->total_fees_payable : '';
            });
            $table->editColumn('fee_balance', function ($row) {
                return $row->fee_balance ? $row->fee_balance : '';
            });
            $table->editColumn('student_grade', function ($row) {
                return $row->student_grade ? $row->student_grade : '';
            });
            $table->editColumn('recommended', function ($row) {
                
                return $row->recommended ? Application::RECOMMENDED_RADIO[$row->recommended] : '';
               
            });
            $table->addColumn('ward_name', function ($row) {
                return $row->ward ? $row->ward->name : '';
            });

            $table->editColumn('on_scholarships', function ($row) {
                return $row->on_scholarships ? Application::ON_SCHOLARSHIPS_SELECT[$row->on_scholarships] : '';
            });
            $table->addColumn('sub_county_name', function ($row) {
                return $row->sub_county ? $row->sub_county->name : '';
            });

            $table->editColumn('voter_card', function ($row) {
                return $row->voter_card ? $row->voter_card : '';
            });
            $table->editColumn('cdf_amount_awarded', function ($row) {
            
                return $row->cdf_amount_awarded ? $row->cdf_amount_awarded : '';
           
            });
            
                $table->editColumn('county_amount_awarded', function ($row) {
                   
                    return $row->county_amount_awarded ? $row->county_amount_awarded : '';
                   
                });
              
            
             $table->editColumn('recommended_for_county', function ($row) {
                
                return $row->recommended_for_county ? Application::RECOMMENDED_FOR_COUNTY_RADIO[$row->recommended_for_county] : '';
                
            });
            $table->addColumn('financial_year_name', function ($row) {
                return $row->financial_year ? $row->financial_year->name : '';
            });

            $table->addColumn('type_name', function ($row) {
                return $row->type ? $row->type->name : '';
            });

            $table->editColumn('gender', function ($row) {
                return $row->gender ? Application::GENDER_RADIO[$row->gender] : '';
            });
            $table->editColumn('cdf_applied', function ($row) {
                
                return $row->cdf_applied ? Application::CDF_APPLIED_RADIO[$row->cdf_applied] : '';
               
            });
          
            $table->editColumn('county_applied', function ($row) {
                
                return $row->county_applied ? Application::COUNTY_APPLIED_RADIO[$row->county_applied] : '';
            
            });
        
      
            $table->editColumn('fathers_identity_card', function ($row) {
                return $row->fathers_identity_card ? '<a href="' . $row->fathers_identity_card->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('attach_student_grade', function ($row) {
                return $row->attach_student_grade ? '<a href="' . $row->attach_student_grade->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('mothers_identity_card', function ($row) {
                return $row->mothers_identity_card ? '<a href="' . $row->mothers_identity_card->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('fees_structure', function ($row) {
                return $row->fees_structure ? '<a href="' . $row->fees_structure->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('fee_balance_attach', function ($row) {
                return $row->fee_balance_attach ? '<a href="' . $row->fee_balance_attach->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('attach_voter_card', function ($row) {
                return $row->attach_voter_card ? '<a href="' . $row->attach_voter_card->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('course_name', function ($row) {
                return $row->course ? $row->course->name : '';
            });

            $table->editColumn('application_no', function ($row) {
                return $row->application_no ? $row->application_no : '';
            });
            $table->editColumn('upload_application_form', function ($row) {
                return $row->upload_application_form ? '<a href="' . $row->upload_application_form->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'ward', 'sub_county', 'financial_year', 'type', 'fathers_identity_card', 'attach_student_grade', 'mothers_identity_card', 'fees_structure', 'fee_balance_attach', 'attach_voter_card', 'course', 'upload_application_form']);
      
            return $table->make(true);
        }

        $users           = User::get();
        $wards           = Ward::get();
        $sub_counties    = SubCounty::get();
        $financial_years = FinancialYear::get();
        $institutions    = Institution::get();
        $courses         = Course::get();
        $id = Auth::id();
        foreach($s_counties as $county) {
        if($title == $county->name) {
        
        return view('admin.applications.index2', compact('title','id','title','users', 'wards', 'sub_counties', 'financial_years', 'institutions', 'courses'));
   
        }
      }
      foreach($ward as $wa) {
        if($title == $wa->name) {
        
        return view('admin.applications.county', compact('title','id','title','users', 'wards', 'sub_counties', 'financial_years', 'institutions', 'courses'));
   
        }
    }
          
        
        return view('admin.applications.index', compact('title','id','title','users', 'wards', 'sub_counties', 'financial_years', 'institutions', 'courses'));
    }

    public function updatecounty(Request $request) {

        $id2 = $request->userid;
        DB::table('applications')->where('user_id', $id2)->update(array('county_applied' => 1));
        
        //return view('admin.applications.index');
        return redirect()->back()->withSuccess('IT WORKS!');
    }


    public function updatebalance(Request $request) {

        $wid = $request->ward_id;
        $bal = $request->amount;
        DB::table('wards')->where('id', $wid)->update(array('amount' => $bal));
        
        //return view('admin.applications.index');
        return redirect()->back()->withSuccess('Allocation Updated!');
    }

    
    public function updatecdf(Request $request) {

        $id = $request->userid2;
        DB::table('applications')->where('user_id', $id)->update(array('cdf_applied' => 1));

       // return view('admin.applications.index');
       return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        if (check_if_system_is_open()) {
            return view('locked');
        }
        $id2 = Auth::id();

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = Institution::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.applications.create', compact('id2','courses', 'financial_years', 'types', 'users', 'wards'));
    }

    public function store(StoreApplicationRequest $request)
    {

        $w = $request->ward_id;

        $app_type = $request->application_type;
        //get the subcounty id for that  ward
        
        if ($app_type == 1) {
            $request->merge([
                'cdf_applied' => 1,
            ]);
        }
        if ($app_type == 2) {
            $request->merge([
                'county_applied' => 1,
            ]);
        }
        $sid = Ward::find($w);
        $sid2 = $sid->sub_county_id;

        $request->merge([
            'sub_county_id' => $sid2,
        ]);
        $application = Application::create($request->all());

        if ($request->input('fathers_identity_card', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('fathers_identity_card'))))->toMediaCollection('fathers_identity_card');
        }

        if ($request->input('attach_student_grade', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('attach_student_grade'))))->toMediaCollection('attach_student_grade');
        }

        if ($request->input('mothers_identity_card', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('mothers_identity_card'))))->toMediaCollection('mothers_identity_card');
        }

        if ($request->input('fees_structure', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('fees_structure'))))->toMediaCollection('fees_structure');
        }

        if ($request->input('fee_balance_attach', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('fee_balance_attach'))))->toMediaCollection('fee_balance_attach');
        }

        if ($request->input('attach_voter_card', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('attach_voter_card'))))->toMediaCollection('attach_voter_card');
        }

        if ($request->input('upload_application_form', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_application_form'))))->toMediaCollection('upload_application_form');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $application->id]);
        }

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_counties = SubCounty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = Institution::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $application->load('user', 'ward', 'sub_county', 'financial_year', 'type', 'course');

        return view('admin.applications.edit', compact('application', 'courses', 'financial_years', 'sub_counties', 'types', 'users', 'wards'));
    }
    public function app_county()
    {
    	//$data = DB::table('applications')->get();
        $role = get_logged_in_role();
       $ward_sum_counter = 0;
        $wc = Ward::all();
    foreach($wc as $w) {

        $w_id = $w->id;
        if ($role == $w->name) {
            $cons = $w->name;
        $data= Application::with(['ward', 'sub_county'])
        ->where('ward_id','=',$w_id)
        ->where('county_applied', '=', 1)
        ->get();
        }
         }
             
    	return view('admin.applications.awardcounty', compact('ward_sum_counter','cons','data'));
    }

    public function app_cdf()
    {
    	//$data = DB::table('applications')->get();
        
        $role = get_logged_in_role();

        $sc = SubCounty::all();
        $cons = '';
        foreach($sc as $s) {
       
     
        if ($role == $s->name) {
            $cons = $s->name;
            $sub_id = $s->id;
        $data= Application::with(['ward', 'sub_county'])
        ->where('sub_county_id','=',$sub_id)
        ->where('cdf_applied', '=', 1)
        ->get();
        }
         }
             
    	return view('admin.applications.awardcdf', compact('data','cons'));
    }


    public function awardcounty(Request $request)
    {
    	//dd($request->crsf);
            
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'county_amount_awarded'	=>	$request->county_amount_awarded,
    			);
    			DB::table('applications')
    				->where('id', $request->id)
    				->update($data);
    		}
    		
    		return response()->json($request);
    	}
       
    }

    public function awardcdf(Request $request)
    {

        if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'cdf_amount_awarded'	=>	$request->cdf_amount_awarded,
    			);
    			DB::table('applications')
    				->where('id', $request->id)
    				->update($data);
    		}
    		
    		return response()->json($request);
    	}
    }
        
    
   
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        if ($request->input('fathers_identity_card', false)) {
            if (!$application->fathers_identity_card || $request->input('fathers_identity_card') !== $application->fathers_identity_card->file_name) {
                if ($application->fathers_identity_card) {
                    $application->fathers_identity_card->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('fathers_identity_card'))))->toMediaCollection('fathers_identity_card');
            }
        } elseif ($application->fathers_identity_card) {
            $application->fathers_identity_card->delete();
        }

        if ($request->input('attach_student_grade', false)) {
            if (!$application->attach_student_grade || $request->input('attach_student_grade') !== $application->attach_student_grade->file_name) {
                if ($application->attach_student_grade) {
                    $application->attach_student_grade->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('attach_student_grade'))))->toMediaCollection('attach_student_grade');
            }
        } elseif ($application->attach_student_grade) {
            $application->attach_student_grade->delete();
        }

        if ($request->input('mothers_identity_card', false)) {
            if (!$application->mothers_identity_card || $request->input('mothers_identity_card') !== $application->mothers_identity_card->file_name) {
                if ($application->mothers_identity_card) {
                    $application->mothers_identity_card->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('mothers_identity_card'))))->toMediaCollection('mothers_identity_card');
            }
        } elseif ($application->mothers_identity_card) {
            $application->mothers_identity_card->delete();
        }

        if ($request->input('fees_structure', false)) {
            if (!$application->fees_structure || $request->input('fees_structure') !== $application->fees_structure->file_name) {
                if ($application->fees_structure) {
                    $application->fees_structure->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('fees_structure'))))->toMediaCollection('fees_structure');
            }
        } elseif ($application->fees_structure) {
            $application->fees_structure->delete();
        }

        if ($request->input('fee_balance_attach', false)) {
            if (!$application->fee_balance_attach || $request->input('fee_balance_attach') !== $application->fee_balance_attach->file_name) {
                if ($application->fee_balance_attach) {
                    $application->fee_balance_attach->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('fee_balance_attach'))))->toMediaCollection('fee_balance_attach');
            }
        } elseif ($application->fee_balance_attach) {
            $application->fee_balance_attach->delete();
        }

        if ($request->input('attach_voter_card', false)) {
            if (!$application->attach_voter_card || $request->input('attach_voter_card') !== $application->attach_voter_card->file_name) {
                if ($application->attach_voter_card) {
                    $application->attach_voter_card->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('attach_voter_card'))))->toMediaCollection('attach_voter_card');
            }
        } elseif ($application->attach_voter_card) {
            $application->attach_voter_card->delete();
        }

        if ($request->input('upload_application_form', false)) {
            if (!$application->upload_application_form || $request->input('upload_application_form') !== $application->upload_application_form->file_name) {
                if ($application->upload_application_form) {
                    $application->upload_application_form->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_application_form'))))->toMediaCollection('upload_application_form');
            }
        } elseif ($application->upload_application_form) {
            $application->upload_application_form->delete();
        }

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('user', 'ward', 'sub_county', 'financial_year', 'type', 'course');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        Application::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('application_create') && Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Application();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
