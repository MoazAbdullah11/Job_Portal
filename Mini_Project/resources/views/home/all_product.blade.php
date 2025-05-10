<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .comment-section {
            width: 98%;
            /* Increase from 95% */
            max-width: 1400px;
            /* Increase from 1000px */
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .comment-section h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
        }

        .comment-form textarea,
        .replyDiv textarea {
            width: 100%;
            height: 120px;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 15px;
            resize: vertical;
        }

        .comment-form input[type="submit"],
        .replyDiv button,
        .replyDiv a.btn {
            padding: 10px 20px;
            background-color: #343a40;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .comment-form input[type="submit"]:hover,
        .replyDiv button:hover,
        .replyDiv a.btn:hover {
            background-color: #23272b;
        }

        .all-comments {
            margin-top: 30px;
        }

        .all-comments h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .comment,
        .reply {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 7px;
            margin-bottom: 15px;
            word-wrap: break-word;
        }

        .reply {
            margin-left: 25px;
            background-color: #eef1f5;
        }

        .comment b,
        .reply b {
            font-size: 15px;
            color: #333;
        }

        .comment p,
        .reply p {
            font-size: 14px;
            margin: 5px 0;
        }

        .reply-link {
            font-size: 14px;
            color: #007bff;
            cursor: pointer;
            text-decoration: none;
        }

        .reply-link:hover {
            text-decoration: underline;
        }

        .replyDiv {
            margin-left: 25px;
            margin-top: 10px;
            display: none;
        }

        /* Tablet View */
        @media (max-width: 991px) {
            .comment-section {
                width: 98%;
                padding: 25px;
            }

            .reply,
            .replyDiv {
                margin-left: 15px;
            }
        }

        /* Mobile View */
        @media (max-width: 600px) {
            .comment-section {
                width: 100%;
                padding: 20px;
            }

            .comment-section h1 {
                font-size: 22px;
            }

            .comment-form textarea,
            .replyDiv textarea {
                height: 100px;
                font-size: 14px;
            }

            .comment-form input[type="submit"],
            .replyDiv button,
            .replyDiv a.btn {
                width: 100%;
                font-size: 14px;
            }

            .reply,
            .replyDiv {
                margin-left: 10px;
            }
        }
    </style>





</head>

<body>

    @include('sweetalert::alert')


    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <!-- end header section -->



        <!-- product section -->
        @include('home.product_view')
        <!-- end product section -->




        {{-- Comment and reply System start here --}}

        <div class="comment-section">
            <h1>Comments</h1>

            <form action="{{ url('add_comment') }}" method="POST" class="comment-form">
                @csrf
                <textarea name="comment" placeholder="Comment something here..."></textarea><br>
                <input type="submit" value="Comment">
            </form>

            <div class="all-comments">
                <h2>All Comments</h2>

                @foreach ($comment as $comment)
                    <div class="comment">
                        <b>{{ $comment->name }}</b>
                        <p>{{ $comment->comment }}</p>
                        <a href="javascript:void(0);" class="reply-link" onclick="reply(this)"
                            data-Commentid="{{ $comment->id }}">Reply</a>

                        @foreach ($reply as $rep)
                            @if ($rep->comment_id == $comment->id)
                                <div class="reply">
                                    <b>{{ $rep->name }}</b>
                                    <p>{{ $rep->reply }}</p>
                                    <a class="reply-link" href="javascript:void(0);" onclick="reply(this)"
                                        data-Commentid="{{ $comment->id }}">Reply</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach

                <div class="replyDiv">
                    <form action="{{ url('add_reply') }}" method="POST">
                        @csrf
                        <input type="text" id="commentId" name="commentId" hidden>
                        <textarea name="reply" placeholder="Write something..."></textarea><br>
                        <button type="submit" class="btn btn-warning">Reply</button>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="reply_close(this)">Close</a>
                    </form>
                </div>
            </div>
        </div>







        {{-- Comment and reply System ends here --}}





        <!-- footer start -->
        {{-- @include('home.footer') --}}
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->


        <script type="text/javascript">
            function reply(caller) {

                document.getElementById('commentId').value = $(caller).attr('data-commentId');

                $('.replyDiv').insertAfter($(caller));

                $('.replyDiv').show();

            }



            function reply_close(caller) {

                $('.replyDiv').hide();

            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>
