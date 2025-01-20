<div class="col-md-4">
    <div class="search-sidebar" data-controller="search-sidebar">
        <h2 class="" style="margin-top: 2%;">Domaines</h2>
        <div style="margin-top: 7%;">
            
            @foreach($skills as $skill)
                <form method="POST" action="{{ route('searchoffre') }}" style="margin-bottom: 20px;">
                    {{ csrf_field() }}
                    <input class="form-control btn-key" name="employee_search" type="hidden" value="{{ $skill->name }}">
                    <ul class="bullet-list list-unstyled">
                        <li class="no-icon normal ">
                            <button type="submit" class="" title="Rechercher une offre" name="offre" style="background: transparent;border: none;cursor: pointer;">
                            <img src="{{ asset('uploads/avatars/{{$skill->picture }}" alt="" class="" style="width: 20px;height: 20px;">&nbsp;&nbsp;
                            {{ $skill->name }} 
                            </button>
                        </li>
                    </ul>
                </form>
            @endforeach
            
            <ul class="bullet-list list-unstyled">
                <li class="no-icon normal ">
                    <button type="submit" class="" title="Rechercher une offre" name="offre" style="background: transparent;border: none;cursor: pointer;">
                        <img src="{{ asset('uploads/avatars/reply-all.png') }}" alt="" class="" style="width: 20px;height: 20px;">&nbsp;&nbsp;
                        <a href="{{ route('welcome') }}" style="color: #394854;">Tous domaines</a>
                    </button>
                </li>
            </ul>
        </div>
       <hr style="border-top: 1px solid #fff;">
   </div>
   
   <br>
   
   <h3 class="" style="margin-top: 2%;text-transform: none;display:none">De quoi avez-vous besoin ?</h3>
   
   <br>
   
   <div class="card" style="box-shadow: 0px 0px 1px #aaaaaa;width: 20rem; border-radius: 0.8rem;margin-bottom: 40px;background: #f0f3f5;/**-ms-transform: rotate(7deg); IE 9 -webkit-transform: rotate(7deg);  Safari transform: rotate(7deg);*/">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
       <!--<ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>-->
        <div class="carousel-inner" style="display:none">
            <div class="carousel-item active">
                <img src="{{ asset('uploads/images/devWeb.png') }}" style="border-radius:15px 15px 0px 0px;" class="d-block w-100" alt="...">
                <!--<div class="carousel-caption d-none d-md-block">
                    <h5>Développement d'application</h5>
                    <p>
                        <ul>
                            <li style="color:#fff;">Web</li>
                            <li style="color:#fff;">Android</li>
                        </ul>
                    </p>
                </div>-->
            </div>
            <div class="carousel-item">
                <img src="..{{ asset('uploads/images/graphisme.png') }}" style="border-radius:15px 15px 0px 0px;" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Graphisme est notre métier</h5>
                    <p>
                        <ul>
                            <li style="color:#fff;">Conception de logos</li>
                            <li style="color:#fff;">Conception des affiches publicitaires</li>
                        </ul>
                    </p>
                </div>-->
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/images/maintenance.png') }}" style="border-radius:15px 15px 0px 0px;" class="d-block w-100" alt="...">
                <!--<div class="carousel-caption d-none d-md-block">
                    <h5>Informatique est notre métier</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>-->
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
            <p class="card-text">
                <h3 style="font-weight: 700 !important;text-transform: uppercase !important;">{{__("Vous recherchez")}}</h3> <br>
                <h3 style="text-transform: none !important;text-align: center;">{{__("un informaticien, un graphiste ?")}}</h2><br>
                <h6 style="text-transform: none !important;text-align: center;">{{__("Trouvez gratuitement un professionnel qualifié et disponible pour votre projet.")}}</h5>
                   
            </p>
        </div>
    </div>
</div>