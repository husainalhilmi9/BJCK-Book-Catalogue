<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Book Catalog</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .card-content {
            width: 100%;
            height: 100%;
            }
        
        .main-panel {
            margin: auto;
            width: 98%;
        }

        .card-list {
            margin: 20px;
        }

        .btn-sm {
            float: right !important;
        }

        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }


    </style>

</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-5" href="#">BJCK</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="">Book Catalogue<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main -->
    <div class="main-panel d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="main-content ml-5 mt-5 col-md-8">
                    <div class="card card-content">
                        <div class="d-flex justify-content-between mt-3">

                            <!-- Modal -->
                            <button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#addBookModal">&#10010; Add Book </button>

                            <!-- Modal Form -->
                            <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addBook">Add Book Form</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="http://localhost/book-catalog-app/endpoint/add_book.php" method="POST" class="add-form" enctype="multipart/form-data">
                                                <div class="form-group" hidden>
                                                    <label for="tbl_book_id">Book ID</label>
                                                    <input type="text" class="form-control" id="bookID" name="tbl_book_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookISBN">ISBN</label>
                                                    <input type="text" class="form-control" id="bookISBN" name="book_isbn" placeholder = "ISBN">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookTitle">Tajuk</label>
                                                    <input type="text" class="form-control" id="bookTitle" name="book_title" placeholder = "Tajuk">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookSection">Section</label>
                                                    <input type="text" class="form-control" id="bookSection" name="book_section" placeholder = "Section">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookAuthor">Penulis</label>
                                                    <input type="text" class="form-control" id="bookAuthor" name="book_author" placeholder = "Penulis">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookPublisher">Penerbit</label>
                                                    <input type="text" class="form-control" id="bookPublisher" name="book_publisher" placeholder = "Penerbit">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-dark">Add Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- View Modal -->

                            <div class="modal fade" id="viewBookDetailsModal" tabindex="-1" aria-labelledby="viewBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewBook">Book Full Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="view-form">
                                                <div class="form-group text-center">
                                                    <h4 class="viewBookTitle"></h4>
                                                </div>
                                                <div class="form-group text-center">
                                                    <b>Section: </b><b class="viewBookSection"></b><br>
                                                    <h6 class="viewBookAuthor"></h6>
                                                    <h6 class="viewBookISBN"></h6>
                                                </div>
                                                <div class="form-group text-center">
                                                    <p class="viewBookPublisher"></p>
                                                </div>
                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#updateBookModal">Update Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Update Book Modal -->
                            <div class="modal fade" id="updateBookModal" tabindex="-1" aria-labelledby="updateBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateBook">Update Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="http://localhost/book-catalog-app/endpoint/update_book.php" method="POST" class="add-form" enctype="multipart/form-data">
                                                <div class="form-group" hidden>
                                                    <label for="updateBookID">Book ID</label>
                                                    <input type="text" class="form-control" id="updateBookID" name="tbl_book_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="updateBookISBN">ISBN</label>
                                                    <input type="text" class="form-control" id="updateBookISBN" name="book_isbn">
                                                </div>
                                                <div class="form-group">
                                                    <label for="updateBookTitle">Tajuk Buku</label>
                                                    <input type="text" class="form-control" id="updateBookTitle" name="book_title" placeholder = "Tajuk">
                                                </div>
                                                <div class="form-group">                                                    
                                                    <label for="updateBookSection">Section</label>
                                                    <input type="text" class="form-control" id="updateBookSection" name="book_section">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookAuthor">Penulis</label>
                                                    <input type="text" class="form-control" id="updateBookAuthor" name="book_author">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookPublisher">Penerbit Buku</label>
                                                    <input type="text" class="form-control" id="updateBookPublisher" name="book_publisher">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-dark">Update Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="form-inline justify-content-end mr-3">
                                <input class="form-control mr-sm-2" id="searchInput" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                        <div class="row book-list">
                            
                        
                            <?php

                                include('conn/conn.php');

                                $stmt = $conn->prepare("SELECT * FROM `tbl_book` ORDER BY `tbl_book_id` DESC");
                                $stmt->execute();


                                $result = $stmt->fetchAll();

                                foreach($result as $row) {
                                    
                                    $bookID = $row['tbl_book_id'];
                                    $bookISBN = $row['book_isbn'];
                                    $bookTitle = $row['book_title'];
                                    $bookSection = $row['book_section'];
                                    $bookAuthor = $row['book_author'];
                                    $bookPublisher = $row['book_publisher'];
                                
                            ?>

                            <div class="card card-list mb-2" style="width:17rem;height:8rem;" data-category="<?= $bookSection ?>">
                                <div class="btn-view">
                                    <button onclick="delete_book('<?php echo $bookID ?>')" type="button" class="btn btn-sm btn-light mr-2 mt-2" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                    <button onclick="update_book('<?php echo $bookID ?>')" type="button" class="btn btn-sm btn-light mt-2" title="Update"><i class="fa-solid fa-pencil"></i></button>
                                    <button onclick="view_details('<?php echo $bookID ?>')" type="button" class="btn btn-sm btn-light mt-2" title="View"><i class="fa-solid fa-list"></i></button>
                                </div>
    
                                <h6 id="bookID-<?= $bookID ?>" hidden><?php echo $bookID ?></h6>
                                <h6 id="bookAuthor-<?= $bookID ?>" hidden><?php echo $bookAuthor ?></h6>
                                <p id="bookPublisher-<?= $bookID ?>" hidden><?php echo $bookPublisher ?></p>
                                <h6 id="bookISBN-<?= $bookID ?>" hidden><?php echo $bookISBN ?></h6>
                                <div class="card-body">
                                    <h6 id="bookTitle-<?= $bookID ?>" class="card-title"><?php echo $bookTitle ?></h6>
                                    <b class="text-muted">Section: </b><b id="bookSection-<?= $bookID ?>" class="card-subtitle text-muted"><?php echo $bookSection ?></b><br>
                                </div>
                            </div>


                            <?php 
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


    <script>
        
        function view_details(id) {
            $("#viewBookDetailsModal").modal("show");

            // Retrieve book details from the clicked card
            let bookISBN = $("#bookISBN-" + id).text();
            let bookTitle = $("#bookTitle-" + id).text();
            let bookSection = $("#bookSection-" + id).text();
            let bookAuthor = $("#bookAuthor-" + id).text();
            let bookPublisher = $("#bookPublisher-" + id).text();

            // Populate the view modal with the retrieved details
            $(".viewBookISBN").text("ISBN: " + bookISBN);
            $(".viewBookTitle").text(bookTitle);
            $(".viewBookSection").text(bookSection);
            $(".viewBookAuthor").text("Penulis: " + bookAuthor);
            $(".viewBookPublisher").text("Penerbit: " + bookPublisher);
        }

        function update_book(id) {
            $("#updateBookModal").modal("show");

            // Retrieve book details from the clicked card
            let updateBookID = $("#bookID-" + id).text();
            let updateBookISBN = $("#bookISBN-" + id).text();
            let updateBookTitle = $("#bookTitle-" + id).text();
            let updateBookSection = $("#bookSection-" + id).text();
            let updateBookAuthor = $("#bookAuthor-" + id).text();
            let updateBookPublisher = $("#bookPublisher-" + id).text();

            // Populate the view modal with the retrieved details
            $("#updateBookID").val(updateBookID);
            $("#updateBookISBN").val(updateBookISBN);
            $("#updateBookTitle").val(updateBookTitle);
            $("#updateBookSection").val(updateBookSection);
            $("#updateBookAuthor").val(updateBookAuthor);
            $("#updateBookPublisher").val(updateBookPublisher);
        }

        function delete_book(id) {

        if (confirm("Do you confirm to delete this book?")) {
            window.location = "http://localhost/book-catalog-app/endpoint/delete_book.php?delete=" + id
        }
        }

        $(document).ready(function () {
            // Function to filter books based on search query
            $("#searchInput").on("keyup", function () {
                var searchQuery = $(this).val().toLowerCase();

                $(".card-list").each(function () {
                    var bookTitle = $(this).find(".card-title").text().toLowerCase();
                    if (bookTitle.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });


    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBBGzjgPxYvyzRvSjg0c6h1DIIzZY6PQFU",
    authDomain: "bjck-book-catalog.firebaseapp.com",
    projectId: "bjck-book-catalog",
    storageBucket: "bjck-book-catalog.appspot.com",
    messagingSenderId: "497876014587",
    appId: "1:497876014587:web:3e9d8e43b756843133675e",
    measurementId: "G-1SBZ0YK8YL"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</html>
