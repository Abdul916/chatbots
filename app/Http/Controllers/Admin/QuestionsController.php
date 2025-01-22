<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Questions;
use App\Models\Admin\QuestionsAnswers;
use Illuminate\Support\Facades\Auth;
use Hash, Session, Validator, DB, DateTime;
use Illuminate\Support\Facades\Validator as FacadesValidator;
class QuestionsController extends Controller
{

    public function index(Request $request)
    {
        $query = Questions::query();
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
        if ($request->filled('search_query')) {
            $searchQuery = $request->input('search_query');
            $query->where(function ($q) use ($searchQuery) {
                $q->where('question', 'like', '%' . $searchQuery . '%');
            });
        }
        $data['questions'] = $query->orderBy('order', 'ASC')->paginate(50);
        $data['filters'] = $request->only(['type', 'search_query']);
        return view('admin.questions.manage_questions', $data);
    }

    public function create()
    {
        return view('admin/questions/add_question');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'type' => 'required',
            'order' => 'nullable',
            'status' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(array('msg' => 'lvl_error', 'response'=>$validator->errors()->all()));
        }
        if($data['type'] == 1){
            foreach ($data['answers'] as $key => $coll) {
                if (empty($coll['choice'])) {
                    return response()->json(['msg' => 'error', 'response' => "Please fill all the multiple choice fields."]);
                }
            }
        }
        $status = $request->input('status', 0);
        $stored = Questions::create([
            'question' => $request->question,
            'type' => $request->type,
            'order' => $request->order,
            'status' => $status,
            'created_at' => now(),
        ]);
        if ($stored->id) {
            if($data['type'] == 1){
                foreach ($data['answers'] as $key => $coll) {
                    QuestionsAnswers::create([
                        'question_id' => $stored->id,
                        'answer' => $coll['choice'],
                        'created_at' => now(),
                    ]);
                }
            }
            return response()->json(['msg' => 'success', 'response' => "Question submitted successfully."]);
        }else{
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong']);
        }
    }

    public function edit($id)
    {
        $data['question'] = Questions::where('id', $id)->first();
        if (!empty($data['question'])) {
            return view('admin/questions/edit_question', $data);
        }
        return redirect('admin/questions');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'type' => 'required',
            'order' => 'nullable',
            'status' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(array('msg' => 'lvl_error', 'response'=>$validator->errors()->all()));
        }
        $status = $request->input('status', 0);
        $stored = Questions::where('id', $data['id'])->update([
            'question' => $request->question,
            'type' => $request->type,
            'order' => $request->order,
            'status' => $status,
            'updated_at' => now(),
        ]);
        if ($stored) {
            return response()->json(['msg' => 'success', 'response' => "Question updated successfully."]);
        }else{
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong']);
        }
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $status = Questions::find($data['id'])->delete();
        if($status > 0) {
            QuestionsAnswers::where('question_id', $data['id'])->delete();
            return response()->json(['msg' => 'success', 'response'=>'Question deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response'=>'Something went wrong!']);
        }
    }

    public function uploadFiles(Request $request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $file_name = explode('.', $file->getClientOriginalName())[0];
            $fileName = $file_name.'-'.time().'.'.$file->getClientOriginalExtension();
            $res = $file->move(public_path('/uploads/images'), $fileName);
            if($res) {
                return url("uploads/images/{$fileName}");
            } else {
                return $res;
            }
        }
        return null;
    }

    public function get_questions_answers(Request $request)
    {
        $questions = Questions::where('status', 1)->orderBy('order', 'ASC')
        ->select('id', 'question', 'type', 'order')
        ->with(['get_question_answers' => function ($query) {
            $query->where('is_deleted', 0)
            ->select('id', 'question_id', 'answer');
        }])->get();
    return response()->json(['msg' => 'success', 'response' => 'success', 'data' => $questions]);
    }

}