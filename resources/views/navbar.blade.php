<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
<!-- font awsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<style>
    #number-favoris{
   position: absolute;
    left: 18px;
    top: -5px;
    color: #f2ecec;
    background: red;
    padding: 0px 4px;
    border-radius: 8px;
    }
    #number-panier{
    position: absolute;
    left: 18px;
    top: -5px;
    color: #f2ecec;
    background: red;
    padding: 0px 4px;
    border-radius: 8px;
    }
    li{
        list-style: none;

    }
    .favoris,.panier{
        margin-right:20px;
    }
    #show-our-collection{
    position: absolute;
    top: 65px;
    left: 20%;
    }
    #container{
        position: relative;
    }

.collecion-menu{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #ffffff;
    width: 100%;
    padding: 35px 25px;
    margin-top: 20px;
    border-radius: 0 0 10px 10px;
    border: 1px solid #eef0ee;
}
    .sub-collection-menu{
        margin-right: 40px;
         padding: 10px;
        border-right: 2px solid #cbc0c0;

    }


    .menu-title{
        font-size: 19px;
        font-weight: 500;
        display: block;
        text-decoration: underline;
        margin-bottom:10px;
        color: #F15412;
    }
    .href-collection{
     display: flex;
    align-items: center;
    justify-content: start;
    }
    .image-collection{
        max-width: 20px;
    }
      @media screen and (max-width:768px){
        #number-favoris{
            left: 26px !important;
            top: -4px !important;
        }
        #number-panier{
            left: 26px !important;
            top: -4px !important;
        }
        .favoris,.panier{
            margin-right:0px !important;

        }


    }
</style>
</head>
<body>



    <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div id="container" class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="#" class="flex items-center">
            <img src="https://ww1.prweb.com/prfiles/2010/03/30/3814834/0_myshoeslogo.jpg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
        </a>
        <div class="flex items-center justify-between md:order-2">

                  <!-- Favoris -->
<div class="favoris">
            <li>
              <a
              style="position: relative;"
               href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
               <svg class="svg-fav-panier" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#231F20" d="M48,6c-4.418,0-8.418,1.791-11.313,4.687l-3.979,3.961c-0.391,0.391-1.023,0.391-1.414,0 c0,0-3.971-3.97-3.979-3.961C24.418,7.791,20.418,6,16,6C7.163,6,0,13.163,0,22c0,3.338,1.024,6.436,2.773,9 c0,0,0.734,1.164,1.602,2.031s24.797,24.797,24.797,24.797C29.953,58.609,30.977,59,32,59s2.047-0.391,2.828-1.172 c0,0,23.93-23.93,24.797-24.797S61.227,31,61.227,31C62.976,28.436,64,25.338,64,22C64,13.163,56.837,6,48,6z M58.714,30.977 c0,0-0.612,0.75-1.823,1.961S33.414,56.414,33.414,56.414C33.023,56.805,32.512,57,32,57s-1.023-0.195-1.414-0.586 c0,0-22.266-22.266-23.477-23.477s-1.823-1.961-1.823-1.961C3.245,28.545,2,25.424,2,22C2,14.268,8.268,8,16,8 c3.866,0,7.366,1.566,9.899,4.101l0.009-0.009l4.678,4.677c0.781,0.781,2.047,0.781,2.828,0l4.678-4.677l0.009,0.009 C40.634,9.566,44.134,8,48,8c7.732,0,14,6.268,14,14C62,25.424,60.755,28.545,58.714,30.977z"></path> <path fill="#231F20" d="M48,12c-0.553,0-1,0.447-1,1s0.447,1,1,1c4.418,0,8,3.582,8,8c0,0.553,0.447,1,1,1s1-0.447,1-1 C58,16.478,53.522,12,48,12z"></path> </g> </g></svg>
               <!-- <i
              style="font-size: 25px;"
               class="fa fa-heart text-lg bg-white-100" aria-hidden="true"></i> -->
              <span id="number-favoris"
              class="text-red-700  " >+0</span>
              </a>
            </li>
</div>
<div class="panier">
            <!-- panier  -->
            <li>
              <a
              style="position: relative;"
               href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
               <svg class="svg-fav-panier" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#020202;stroke-miterlimit:10;stroke-width:0.288;}</style> </defs> <g id="cart"> <circle class="cls-1" cx="10.07" cy="20.59" r="1.91"></circle> <circle class="cls-1" cx="18.66" cy="20.59" r="1.91"></circle> <path class="cls-1" d="M.52,1.5H3.18a2.87,2.87,0,0,1,2.74,2L9.11,13.91H8.64A2.39,2.39,0,0,0,6.25,16.3h0a2.39,2.39,0,0,0,2.39,2.38h10"></path> <polyline class="cls-1" points="7.21 5.32 22.48 5.32 22.48 7.23 20.57 13.91 9.11 13.91"></polyline> </g> </g></svg>

               <!-- <i
              style="font-size: 25px;"
               class="fa fa-shopping-bag text-lg" aria-hidden="true"></i> -->
              <span id="number-panier"

              class="text-red-700  " >+0</span>
              </a>
            </li>
            </div>
            <!-- login-register -->
            <div class="login-register">
                <li>
                    <a href="" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                    <svg width="40px" height="40px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="User / User_Circle"> <path id="Vector" d="M17.2166 19.3323C15.9349 17.9008 14.0727 17 12 17C9.92734 17 8.06492 17.9008 6.7832 19.3323M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11C15 12.6569 13.6569 14 12 14Z" stroke="#000000" stroke-width="0.264" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                    </a>
                </li>
            </div>
            <div class="button-mobile">
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
              <svg class="w-8 h-8" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
          </div>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
          <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li id="home">
              <a href="#" class="block py-2 pl-3 pr-4 text-white bg-green-400 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
            </li>
            <li>
              <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
            </li>
            <li>
              <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Shop</a>
            </li>
            <li id="our-collection">
              <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Our Collection
                <i  style="margin:5px 0px 0px 5px !important; font-size: 15px !important;position: absolute;color: #6b6c78 !important;"
                 id="fa-angle" class="fa fa-angle-down " aria-hidden="true"></i> </a>
                    <div
                    {{-- style="display: none;" --}}
                     id="show-our-collection">
                     <ul class="collecion-menu">
                        <li class="sub-collection-menu">
                            <a class="menu-title" href="#">Women's </a>
                            <ul>
                                <li>
                                    <a class="href-collection" href="#">
                                   <img class="image-collection" src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg" alt="">
                                   Baskets</a>
                                </li>
                                <li><a class="href-collection" href="#">
                                    <img class="image-collection" src="https://th.bing.com/th/id/OIP.EtBxB-yQhMpsxLgM_IU4UgHaD4?pid=ImgDet&rs=1" alt="">
                                    Bottines</a></li>
                                <li><a class="href-collection" href="#">
                                    <img class="image-collection" src="https://i.pinimg.com/736x/cb/ac/41/cbac41f71608f2789e52a8ab7a149af2.jpg" alt="">
                                    Sandales</a></li>
                                <li><a class="href-collection" href="#">
                                   <img class="image-collection" src="https://th.bing.com/th/id/R.34d364280dc3981976ddffedfdc3a0df?rik=7eac6%2ffExDVsQQ&pid=ImgRaw&r=0" alt="">
                                    Escarpins</a></li>
                                <li><a class="href-collection" href="#">
                                    <img class="image-collection" src="https://i.etsystatic.com/7857639/r/il/2c1d7c/569721454/il_570xN.569721454_tj6i.jpg" alt="">
                                    Ballerines</a></li>

                            </ul>
                        </li>
                        <li class="sub-collection-menu">
                            <a class="menu-title" href="#">Men's </a>
                            <ul>
                                <li>
                                    <a class="href-collection" href="#">
                                   <img class="image-collection" src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg" alt=""> Baskets</a>
                                </li>
                                <li><a class="href-collection" href="#">
                                    <img class="image-collection" src="https://th.bing.com/th/id/OIP.EtBxB-yQhMpsxLgM_IU4UgHaD4?pid=ImgDet&rs=1" alt="">
                                    Bottines</a></li>
                                <li><a class="href-collection" href="#">
                                   <img class="image-collection" src="https://th.bing.com/th/id/R.e8ab7a03b0e7c1d1dd8bf8ce4c51cb35?rik=iqXtXzEk%2fhNZpg&riu=http%3a%2f%2ffreevector.co%2fwp-content%2fuploads%2f2011%2f11%2f88794-leather-derby-shoe.png&ehk=qne8PvjyKlAYHcyfI5pHp1jFBwJTJam9tplrMRTqpE0%3d&risl=&pid=ImgRaw&r=0" alt=""> Derbies</a></li>
                                <li><a class="href-collection" href="#">
                                   <img class="image-collection" src="https://th.bing.com/th/id/R.edaa03ba97c24836ffab72fadbf54af3?rik=Q%2bqO66ESo0KAtg&pid=ImgRaw&r=0" alt=""> sport</a></li>
                                <li><a class="href-collection" href="#">
                                   <img class="image-collection" src="https://th.bing.com/th/id/R.6c56b70b68b8777996ce0cf1ed7b037f?rik=3KeDmYGPs0mxuw&riu=http%3a%2f%2f4.bp.blogspot.com%2f-fZCTkk-fLhQ%2fVAs8OWNlN0I%2fAAAAAAAAiIY%2fLGLjAO846N8%2fs1600%2fScreen%2bShot%2b2014-09-06%2bat%2b9.53.14%2bAM.png&ehk=jR55zS2BY%2bVXMQXILuUNnl3xkwX9IAElGNyPsoZVSio%3d&risl=&pid=ImgRaw&r=0" alt=""> Mocassins</a></li>

                            </ul>
                        </li>
                        <li class="sub-collection-menu">
                            <a class="menu-title" href="#">Children's </a>
                            <ul>
                                <li>
                                    <a class="href-collection" href="#">
                                   <img class="image-collection" src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg" alt=""> Baskets</a>
                                </li>
                                <li><a class="href-collection" href="#">
                                    <img class="image-collection" src="https://i.pinimg.com/736x/cb/ac/41/cbac41f71608f2789e52a8ab7a149af2.jpg" alt="">
                                    Sandales</a></li>
                                <li><a class="href-collection" href="#">
                                    <img class="image-collection" src="https://th.bing.com/th/id/OIP.EtBxB-yQhMpsxLgM_IU4UgHaD4?pid=ImgDet&rs=1" alt="">
                                    Bottines</a></li>
                                    <li><a class="href-collection" href="#">
                                        <img class="image-collection" src="https://i.etsystatic.com/7857639/r/il/2c1d7c/569721454/il_570xN.569721454_tj6i.jpg" alt="">
                                        Ballerines</a></li>
                                <li><a class="href-collection" href="#">
                                   <img class="image-collection" src="https://thumbs.dreamstime.com/b/sleeping-slippers-couple-hand-drawn-sketch-home-shoes-pair-black-white-doodle-vector-isolated-illustration-sleeping-slippers-213350844.jpg" alt=""> Pantoufles</a></li>


                            </ul>
                        </li>
                     </ul>
                    </div>
                </li>
            <li>
              <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
            </li>


          </ul>

        </div>



    </div>

      </nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script>
$(document).ready(function(){
    $('#show-our-collection').hide();
        $('#our-collection').click(function() {
    $('#show-our-collection').toggle();
  });
    $('#show-our-collection').hover(function(){
        $(this).show();
    }, function() {
    $(this).hide();
  }
  )

// fin jquery
});
</script>
</body>

</html>

