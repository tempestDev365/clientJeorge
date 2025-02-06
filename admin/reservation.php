<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>

    <!--BOOTSTRAP CDN CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--DATA TABLES CDN CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">

    <link rel="stylesheet" href="./assets/main.css">

</head>
<body>

    <!--PARENT CONTAINER-->
    <div class="main-container d-flex" style="min-height: 100vh;">

        <!--SIDEBAR-->
        <aside class="sidebar"></aside>



        <!--MAIN CONTENT-->
        <main class="flex-grow-1 p-3 text-white" style="background-color: #C6953B;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Reservation</li>
                </ol>
            </nav>

            <div class="container shadow p-3 bg-light rounded-3">
                <table class="table table-striped table-hover table-bordered dt-responsive nowrap" id="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>DATE CREATED</th>
                            <th>NAME</th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>PEOPLE</th>
                            <th>CONTACT</th>
                            <th>EMAIL</th>
                            <th>TRANSACTION REF</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>91</td>
                            <td>2/6/2025</td>
                            <td>John Doe</td>
                            <td>2/6/2025</td>
                            <td>11:44 AM</td>
                            <td>PEOPLE</td>
                            <td>0999999999</td>
                            <td>johndoe@gmail.com</td>
                            <td>232323</td>
                            <td>PENDING</td>
                            <td>
                                <button class="btn btn-sm btn-success">APPROVE</button>
                                <button class="btn btn-sm btn-danger">CANCEL</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>




    <!--BOOTSTRAP CDN JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--DATA TABLES CDN JS-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

    <!--NAVIGATION JS-->
    <script src="./layout/nav.js"></script>

    <script>
        new DataTable('#table', {
            responsive: true
        });
    </script>

    <!--NAVIGATION JS-->
    <script src="./layout/nav.js"></script>

</body>
</html>