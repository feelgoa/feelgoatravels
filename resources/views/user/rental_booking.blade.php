@extends('layouts.app')

@section('content')
<style>
.section-title {
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 80px;
}
.rental_p {
    color:white;
}
.single-cat-widget {
    position: relative;
    text-align: center;
    height: 280px;
    box-shadow: 1px 1px 4px -1px #000;
    background-color: white;
}
.relative {
    position: relative;
}
.single-cat-widget .overlay1-bg {
    background: rgba(0, 0, 0, 0.85);
    background: rgba(0, 0, 0, 0.49);
    margin: 7%;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
}

.overlay1 {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
.single-cat-widget img {
    width: 100%;
    border-radius: 11px;
}
.single-cat-widget .content-details {
    top: 27%;
    left: 30px;
    right: 19px;
    margin-left: auto;
    margin-right: auto;
    color: #fff;
    bottom: 0px;
    position: absolute;
}
.single-cat-widget .content-details h4 {
    color: #fff;
}
.single-cat-widget .content-details span {
    display: inline-block;
    background: #fff;
    width: 60%;
    height: 1%;
}
.tabs {
  padding-top: 10%;
}

.tabs__header {
  text-align: center;
  display: flex;
  justify-content: space-between;
}

.tabs__heading {
  text-transform: uppercase;
  font-weight: 1000;
  color: black;
  background-color: #F9F9F9;
  border: 1px solid #e8e4e4;
  flex: 1;
  padding: 10px;
  cursor: pointer;
  user-select: none;
  border-radius: 30px 30px 30px 30px;
}

.tabs__heading.is-active {
    background-color: #ffffff;
    background: rgb(255 255 255);
    color: rgb(206, 50, 50);
    border: 1px solid rgb(206, 50, 50);
    box-shadow: 0px 1px 8px 1px rgb(206, 50, 50);
}

.tabs__content {
  padding: 10px;
  border-radius: 0 0 4px 4px;
  display: none;
}

.tabs__content.is-active {
  display: block;
}
</style>
<section style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/contact-us-4.jpg'); padding: 12px;">
	<div class="container" style="background-color: #0000008c;border-radius: 15px;margin-top:20px;">
		
        <div class="tabs">
            <div class="tabs__header">
                <div class="tabs__heading is-active" data-tab-index="tab-1">Rent Bikes (Self Ride)</div>
                <div class="tabs__heading" data-tab-index="tab-2">Rent Cars</div>
            </div>
            <div class="tabs__body">
                <div class="tabs__content tab-1 is-active">
                    <hr>
                    <div class="row">	
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Swift Desire')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/activa.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Honda Activa 125</h4>
                                        <span></span>								        
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                        <button class="btn btn-success">Select</button>
                                    </div>
                                    </a>
                                </div>
                                
                            </div>
                        </div>	
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Toyota Eitos')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/access.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Suzuki Access 125</h4>
                                        <span></span>	
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Ritz')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/maestro.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Hero Maestro</h4>
                                        <span></span>
                                        <p class="rental_p">Capacity : 4+1 Seater</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                    </div><hr>

                    <div class="row">			
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Temp Travellor')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/bullet.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Royal Enfield Bullet 350</h4>
                                        <span></span>								        
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Toyota Innova')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/fz.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Yamaha FZ</h4>
                                        <span></span>								        
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Mini-Bus')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/duke.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Duke 200</h4>
                                        <span></span>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                    </div><hr>
                </div>
                <div class="tabs__content tab-2">
                    <hr>
                    <div class="row">	
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Swift Desire')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/swift.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Swift Desire</h4>
                                        <span></span>								        
                                        <p class="rental_p">Capacity:4+1 seater.</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Toyota Eitos')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/etions.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Toyota Eitos</h4>
                                        <span></span>	
                                        <p class="rental_p">Capacity : 4+1 Seater</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Ritz')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/ritzs.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Ritz</h4>
                                        <span></span>
                                        <p class="rental_p">Capacity : 4+1 Seater</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                    </div><hr>

                    <div class="row">			
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Temp Travellor')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/tempotraveler.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Temp Travellor (AC/Non-AC)</h4>
                                        <span></span>								        
                                        <p class="rental_p">Capacity : 12+1 Seater</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Toyota Innova')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/innova.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Toyota Innova</h4>
                                        <span></span>								        
                                        <p class="rental_p">Capacity : 6+1 Seater</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay1 overlay1-bg"></div>
                                    <a href="#" data-toggle="modal" data-target="#rentcar" onclick="vehicleSelect('Mini-Bus')">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="{{ URL::asset('assets/images/vehicles/luxurybus.png') }}" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Mini-Bus</h4>
                                        <span></span>
                                        <p class="rental_p">Capacity : 18,31+1 Seater</p>
                                        <p class="rental_p">Rate: 1500 Per Day</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>	
                    </div><hr>
        
                </div>
            </div>
        </div>
	</div>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>	
    <script>
        "use strict";

document.querySelectorAll(".tabs").forEach((tab) => {
  // Selecting headings and blocks with content
  const tabHeading = tab.querySelectorAll(".tabs__heading");
  const tabContent = tab.querySelectorAll(".tabs__content");

  // A variable for the data attribute
  let tabName;

  // For each tab heading...
  tabHeading.forEach((element) => {
    // ...add event listener
    element.addEventListener("click", () => {
      // Disabling each tab
      tabHeading.forEach((item) => {
        item.classList.remove("is-active");
      });

      // Enabling a tab
      element.classList.add("is-active");

      // Getting value from the data attribute
      tabName = element.getAttribute("data-tab-index");

      // Checking all the blocks with content
      tabContent.forEach((item) => {
        // If the item has the same class as the value of the data attribute...
        item.classList.contains(tabName)
          ? item.classList.add("is-active")
          : item.classList.remove("is-active");

        // Add class 'is-active' to this item
        // Otherwise, remove the class
      });
    });
  });
});
</script>
</section>
@endsection