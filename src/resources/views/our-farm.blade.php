
@extends('layouts.front')

@section('content')
    

      

     
    <!-- our-farms section -->

<section class="our-farms-section text-center">
    <div class="container">
       <h1>Our Farm</h1>
        <div class="desc pb-4">
            <p>Our farm infrastructure is designed for safe and organic care of animals. Each animal is given utmost care and attention to ensure you have the finest qurbani animal to sacrifice in the name of Allah.</p>
            <p>Our staff is specially trained and monitors all aspects of quality assurance. The animals are checked regularly by our medical teams and highest standards of cleanliness are maintained to ensure your finest qurbani animal reaches your doorstep safe and healthy.</p>               
            <p>So, do not hesitate to schedule a visit to our farm and see for yourself!</p>
        </div>

      <h1>Farm Gallery</h1>
      <div class="row justify-content-center">
         <div class="col-sm-4 py-2">
            <div class="animal-image">
               <a href="images/farm1.jpg" data-fancybox="gallery"><img src="images/farm1-thumb.jpg"></a>
            </div>
         </div>
         <div class="col-sm-4 py-2">
            <div class="animal-image">
            <a href="images/farm2.jpg" data-fancybox="gallery"><img src="images/farm2-thumb.jpg"></a>
            </div>
         </div>
         <div class="col-sm-4 py-2">
            <div class="animal-image">
            <a href="images/farm3.jpg" data-fancybox="gallery"><img src="images/farm3-thumb.jpg"></a>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4 py-2">
            <div class="animal-image">
            <a href="images/farm4.jpg" data-fancybox="gallery"><img src="images/farm4-thumb.jpg"></a>
            </div>
         </div>
         <div class="col-sm-4 py-2">
            <div class="animal-image">
            <a href="images/farm5.jpg" data-fancybox="gallery"><img src="images/farm5-thumb.jpg"></a>
            </div>
         </div>
      </div>
    </div>
</section>
@include('supplier')
@include('footer')

      {{-- <script src="/js/jquery-3.5.1.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/slick.js"></script> --}}
   </body>
</html>
<script>
   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>

@endsection