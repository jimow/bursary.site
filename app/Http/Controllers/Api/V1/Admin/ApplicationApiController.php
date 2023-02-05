<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Resources\Admin\ApplicationResource;
use App\Models\Application;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource(Application::with(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course'])->get());
    }

    public function store(StoreApplicationRequest $request)
    {
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

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource($application->load(['user', 'ward', 'sub_county', 'financial_year', 'type', 'course']));
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

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
