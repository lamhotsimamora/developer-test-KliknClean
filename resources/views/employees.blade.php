<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Titillium+Web:400,300,700&amp;subset=latin,latin-ext" />
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title> Employees| Developer Test KlikNClean</title>

   
    {{-- vue js --}}
    <script src="{{ asset('storage/_asset_/js/vue.js') }}"></script>

    {{-- library ajax buatan sendiri --}}
     <script src="{{ asset('storage/_asset_/js/jnet.js') }}"></script>

      {{-- library buatan sendiri --}}
      <script src="{{ asset('storage/_asset_/js/garuda.js') }}"></script>

     {{-- sweet alert --}}
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <style>
      [v-cloak] {
          display: none;
      }
  </style>
</head>
<body>

    @include('_static.navbar') 


    <div class="container">
        <div id="employees" class="card" v-cloak>
            <h5 class="text-center"><strong>Data Employees</strong></h5>
            <span class="badge bg-light text-dark"><strong>Total : @{{ total_data }}</strong></span>
            <hr>
            <div class="card-body">
                  {{-- tabel --}}
                  <button type="button" data-bs-toggle="modal" data-bs-target="#modal_add_data" class="btn btn-primary">+ Add New</button>
                    <br><br>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Search</span>
                      <input ref="search_employees_name" v-model="search_employees_name" @keypress="enterSearchEmployeesName" type="text" class="form-control" placeholder="Employees Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                  <div class="table-responsive">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                        <th scope="col">@</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(employees,i) in data_employees">
                        <th scope="row">@{{ employees.employees_id }}</th>
                        <td>@{{ employees.fullname }}</td>
                        <td><a href="#">@{{ employees.company_name }}</a></td>
                        <td>@{{ employees.department }}</td>
                        <td>@{{ employees.email  }}</td>
                        <td><button @click="deleteData(employees.employees_id )" type="button" class="btn btn-danger btn-sm">x</button></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  {{-- tabel --}}

                  <hr>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" @click="firstPageGo()" href="#">First</a></li>
                      <li class="page-item"><a class="page-link" @click="prevPageGo()" href="#">Previous</a></li>
                      <li v-for="(btn_number_page,i) in data_btn_number_page" class="page-item"><a :data="btn_number_page.url"  class="page-link" @click="pageNumberGo($event)" href="#">
                        @{{i=i+1 }}</a></li>
                      <li class="page-item"><a class="page-link" @click="nextPageGo()" href="#">Next</a></li>
                      <li class="page-item"><a class="page-link" @click="lastPageGo()" href="#">Last</a></li>
                    </ul>
                  </nav>
            </div>
        </div>    
    </div>
    

    {{-- modal add data --}}
<div v-cloak class="modal fade" id="modal_add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employees</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger" role="alert" v-if="show_alert">
         Email is not valid
        </div>
         
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fullname</span>
                <input type="text" @keypress="enterSearch" v-model="fullname" placeholder="..." class="form-control" aria-label="Fullname" aria-describedby="basic-addon1" ref="fullname">
              </div>

              <select v-model="companies" class="form-select" aria-label="Default select example">
                <option v-for="companies in data_companies" :value="companies.company_id">@{{ companies.company_name }}</option>
              </select> <br>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Department</span>
                <input type="text" @keypress="enterSearch" v-model="department" placeholder="..." class="form-control" aria-label="Department" aria-describedby="basic-addon1" ref="department">
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="text" @keypress="enterSearch" v-model="email" placeholder="..." class="form-control" aria-label="Email" aria-describedby="basic-addon1" ref="email">
              </div>
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button @click="addData" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
   {{-- modal add data --}}

    <script>

      // get token from laravel
      const $token  = '{{ csrf_token() }}';
      const $URL_SERVER = '{{ url('/') }}';

    </script>

{{--  application js --}}
<script src="{{ asset('storage/js/init.js') }}" defer></script>
<script src="{{ asset('storage/js/employees.js') }}" defer></script>


<!-- Bootstrap UI JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>