<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Titillium+Web:400,300,700&amp;subset=latin,latin-ext" />
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title> Home | Developer Test KlikNClean</title>

   
    {{-- vue js --}}
    <script src="{{ asset('storage/_asset_/js/vue.js') }}"></script>

    {{-- library ajax buatan sendiri --}}
     <script src="{{ asset('storage/_asset_/js/jnet.js') }}"></script>

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
        <div id="companies" class="card" v-cloak>
            <h5 class="text-center"><strong>Data Companies</strong></h5>
            <span class="badge bg-light text-dark"><strong>Total : @{{ total_data }}</strong></span>
            <hr>
            <div class="card-body">
                  {{-- tabel --}}
                  <button type="button" data-bs-toggle="modal" data-bs-target="#modal_add_data" class="btn btn-primary">+</button>
                    <br><br>
                  <div class="table-responsive">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">@</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(companies,i) in data_companies">
                        <th scope="row">@{{ i+1 }}</th>
                        <td>@{{ companies.company_name }}</td>
                        <td>@{{ companies.company_email }}</td>
                        <td>@{{ companies.company_address }}</td>
                        <td>@{{ companies.company_phone }}</td>
                        <td><button @click="deleteData(companies.company_id)" type="button" class="btn btn-danger btn-sm">x</button></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  {{-- tabel --}}
            </div>
        </div>    
    </div>
    

    {{-- modal add data --}}
<div v-cloak class="modal fade" id="modal_add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Companies</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="container">
            <div class="card-body">

                <label for="_name" class="form-label">Name</label>
                <input type="text" v-model="name" class="form-control" ref="name">

                <label for="_email" class="form-label">Email</label>
                <input type="email" v-model="email" class="form-control" ref="email">

                <label for="_address" class="form-label">Address</label>
                <input type="text" v-model="address" class="form-control" ref="address">

                <label for="_phone" class="form-label">Phone</label>
                <input type="text" v-model="phone" class="form-control" ref="phone">
                
            </div>
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
<script src="{{ asset('storage/js/companies.js') }}" defer></script>


<!-- Bootstrap UI JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>