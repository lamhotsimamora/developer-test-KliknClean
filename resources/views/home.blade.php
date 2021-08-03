<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="//fonts.googleapis.com/css?family=Titillium+Web:400,300,700&amp;subset=latin,latin-ext" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
        <div id="report" class="card" v-cloak>
            <h5 class="text-center"><strong>Data Report</strong></h5>

            <div class="card-body">
                {{-- tabel --}}

                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Total Employees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(report,i) in data_report">
                                <th scope="row">@{{ i + 1 }}</th>
                                <td>@{{ report . company_name }}</td>
                                <td><a data-bs-toggle="modal" data-bs-target="#modal_view_employees" href="#"
                                        @click="loadDataEmployees(report.company_id,report.company_name)">@{{ report . total_employees }}
                                        Orang</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- tabel --}}
            </div>
        </div>
    </div>

    {{-- modal view employees --}}
    <div v-cloak class="modal fade" id="modal_view_employees" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data employees in @{{ company_name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <ol class="list-group list-group-numbered">
                        <li v-for="employees in data_employees"
                            class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">@{{ employees . fullname }}</div>
                                @{{ employees . email }}
                            </div>
                            <span
                                class="badge bg-primary rounded-pill"><small>@{{ employees . department }}</small></span>
                        </li>
                    </ol>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add data --}}


    <script>
        // get token from laravel
        const _TOKEN_ = '{{ csrf_token() }}';
        const $URL_SERVER = '{{ url('/') }}';
    </script>

    {{-- application js --}}
    <script src="{{ asset('storage/js/init.js') }}" defer></script>
    <script src="{{ asset('storage/js/home.js') }}" defer></script>


    <!-- Bootstrap UI JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
</body>

</html>
