

    <div class="row">
        <div class="col-md-3">
            <label>EMP-ID</label>
           
    <input class="form-control" type="text" placeholder="EMP-ID" name="emp_id">                
        </div>

        <div class="col-md-3"><label>Company</label>
            <select name="company_id" id="select_id"   class="form-control">
                <option value="null">Choose</option>
                @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->company}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>Department</label>
            <select name="department_id" class="form-control"   id="select_id">
                <option value="null">Choose</option>
              @foreach($departments as $department)
            <option  value="{{$department->id}}">{{$department->department}}</option>
               @endforeach
               
            </select>
        </div>
        <div class="col-md-3">
            <label>Designation</label>
            <select name="designation_id" class="form-control" @change="getEmployee"  id="select_id">
                <option value="null">Choose</option>
                @foreach($designations as $designation)
            <option  value="{{$designation->id}}">{{$designation->desgination}}</option>
               @endforeach
               
            </select>
        </div>
      
    </div>
  
    <button type="submit" class="btn btn-success mt-3 mb-3">Find</button>
