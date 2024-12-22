<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('school.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function validate(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        if(DB::select('select student_id, student_name from students where student_id=? and student_name=?',[$password,$name])){
            $data = DB::select('select student_id, student_name, form from students where student_id=?', [$password]);
            $student_id = $data[0]->student_id;
            $student_name = $data[0]->student_name;
            $form = $data[0]->form;
            $request->session()->put('password', $student_id);
            $request->session()->put('name', $student_name);
            $request->session()->put('form', $form);
            return view('school.home', ['name'=>$student_name, 'password'=>$student_id]);
        }
        else{
            return view('school.login', ['message'=>"Invalid inputs!!"]);

        }
        //return view('school.home',['name'=>$name, 'password'=>$password]);

    }
    public function portal(Request $request){
        $password = $request->session()->get('password');
        $name = $request->session()->get('name');
        $form = $request->session()->get('form');
        if(!isset($password) || !isset($name) || !isset($form)){
            return view('school.portal',['password'=>'', 'name'=>'', 'form'=>'', 'mathematics'=>'', 'english'=>'', 'kiswahili'=>'', 'biology'=>'', 'chemistry'=>'', 'total'=>'', 'paid'=>'', 'balance'=>'']);
        }
        else{
        $marks = DB::select('select mathematics, english, kiswahili, biology, chemistry from marks where student_id=?', [$password]);
        $mathematics = $marks[0]->mathematics;
        $english = $marks[0]->english;
        $kiswahili = $marks[0]->kiswahili;
        $biology = $marks[0]->biology;
        $chemistry = $marks[0]->chemistry;

        $fees = DB::select('select total, paid, balance from fees where student_id=?',[$password]);
        $total = $fees[0]->total;
        $paid = $fees[0]->paid;
        $balance = $fees[0]->balance;
        return view('school.portal',['password'=>$password, 'name'=>$name, 'form'=>$form, 'mathematics'=>$mathematics, 'english'=>$english, 'kiswahili'=>$kiswahili, 'biology'=>$biology, 'chemistry'=>$chemistry, 'total'=>$total, 'paid'=>$paid, 'balance'=>$balance]);
        }
    }
    public function admin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(DB::select('select admin_email, admin_password from admin where admin_email=? and admin_password=?',[$email, $password])){
            return view('school.admin');
        }

    }
    public function addget(){
        return view('school.admin');
    }
    public function marksget(){
        return view('school.admin');
    }
    public function add(Request $request){
        $name = $request->input('name');
        $form = $request->input('form');
        $query1 = DB::select('select student_name from students where student_name=?',[$name]);
        if($query1){
            $message = "Student already exists";
            return view('school.admin', ['message' => $message]);
        }
        else{
            $query = DB::insert('insert into students(student_name, form) values (?, ?)',[$name, $form]);
        if($query){
            $query_id = DB::select('select student_id from students where student_name = ?',[$name]);
            $student_id = $query_id[0]->student_id;
            DB::insert('insert into fees(student_id, total, paid, balance) values (?, ?, ?, ?)',[$student_id,25000, 0, 0]);
            $message = "Student registered successfully";
            return view('school.admin', ['message' => $message]);
        }
        else{
            $message = "An error occurred";
            return view('school.admin', ['message' => $message]);
        }

        }
        
    }
    public function marks(Request $request){
        $student_id = $request->input('student_id');
        $mathematics = $request->input('mathematics');
        $english = $request->input('english');
        $kiswahili = $request->input('kiswahili');
        $biology = $request->input('biology');
        $chemistry = $request->input('chemistry');
        $query1 = DB::select('select student_id from marks where student_id=?',[$student_id]);
        if($query1){
            $message2 = "Student's marks already added";
            return view('school.admin', ['message2' => $message2]);
        }
        else{
            $query = DB::insert('insert into marks(student_id, mathematics, english, kiswahili, biology, chemistry) values (?,?,?,?,?,?)',[$student_id, $mathematics, $english, $kiswahili, $biology, $chemistry]);
        if($query){
            $message2 = "Marks added successfully";
            return view('school.admin', ['message2' => $message2]);
        }
        else{
            $message2 = "An error occurred";
            return view('school.admin', ['message2' => $message2]);
        }

        }
        
    }
    public function payget(){
        return view('school.portal');
    }
    public function pay(Request $request){
        $amount = $request->input('amount');
        $student_id = $request->session()->get('password');
        if(isset($student_id)){
        $query = DB::select('select total, paid, balance from fees where student_id=?',[$student_id]);
        $total = $query[0]->total;
        $paid = $query[0]->paid;
        $balance = $query[0]->balance;
        $paid += $amount;
        $balance = $total - $paid;
        $update = DB::update('update fees set paid=?, balance=? where student_id=?', [$paid, $balance, $student_id]);
        $query_name = DB::select('select student_name from students where student_id=?',[$student_id]);
        $student_name = $query_name[0]->student_name;
        $date = date('Y-m-d H:i:s');
        $served_by = "Dr. Gideon Ushindi";
        $data = ['total' => $total,'paid'=> $paid, 'balance'=> $balance, 'student_id' => $student_id,'student_name' => $student_name, 'date'=>$date, 'served_by'=>$served_by];
         // Load a view and pass data
        $pdf = Pdf::loadView('school.receipt', $data);

        // Output the PDF directly to the browser
        return $pdf->stream('document.pdf');

        // Or download the PDF
        // return $pdf->download('document.pdf');
        //return view('school.login');
        }
        else{
            return view('school.login');
        }
    }
    public function message(){
        return view('school.message');
    }
}
