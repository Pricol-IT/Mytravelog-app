<div class="modal fade fmodal" id="form-modal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id='service-form' action="#">


            <div class="row ">
              <div class="col-lg-12 mb-3">
                <label>Trip Type</label>
                <select class="form-control" required name="triptype" id="triptype">
                  <option> Select Type</option>
                  <option value="single">Single trip</option>
                  <option value="round">Round Trip</option>
                </select>
                <input type="hidden" value="" class="vehicle">

              </div>

            </div>
            <div class="single row">
              <hr>
              <h5 class="text-center text-primary">Single</h5>
              <div class="col-6">
                <label>From</label>
                <input type="text" required class="form-control" name="from" id="from" placeholder="Origin">
              </div>
              <div class="col-6">
                <label>To</label>
                <input type="text" required class="form-control" name="to" id="to" placeholder="Destination">
              </div>
              <div class="col-6 mb-2">
                <label>Date and Time</label>
                <input type="datetime-local" required class="form-control" name="date" id="date">
              </div>
              <div class="col-6 flight-form">
                <label>Class</label>
                <select class="form-control" required name="fl_class" id="fl_class">
                  <option value=""> Select Class</option>
                  <option value="Economy">Economy class</option>
                  <option value="Premium">Premium class</option>
                  <option value="Business">Business class</option>
                  <option value="First">First class</option>
                </select>
              </div>

              <div class="col-6 train-form">
                <label>Class</label>
                <select class="form-control" required name="tr_class" id="tr_class">
                  <option value=""> Select Class</option>
                  <option value="1A">First AC (1A)</option>
                  <option value="2A">Second AC (2A)</option>
                  <option value="FC">First Class (FC)</option>
                  <option value="3A">Third AC (3A)</option>
                  <option value="SL">Sleeper (SL)</option>
                </select>
              </div>

              <div class="col-6 bus-form">
                <label>Class</label>
                <select class="form-control" required name="bs_class" id="bs_class">
                  <option value=""> Select Class</option>
                  <option value="Seater">Seater</option>
                  <option value="Sleeper">Sleeper</option>
                  <option value="Seater AC">Seater AC</option>
                  <option value="Sleeper AC">Sleeper AC</option>
                </select>
              </div>

              <div class="col-6 taxi-form">
                <label>Car Type</label>
                <select class="form-control" required name="tx_class" id="tx_class">
                  <option value=""> Select type</option>
                  <option value="Hatchback">Hatchback</option>
                  <option value="Sedan">Sedan</option>
                  <option value="SUV">SUV</option>
                </select>
              </div>

            </div>

            <div class="round row">
              <hr>
              <h5 class="text-center text-primary">Round</h5>

              <div class="col-6">
                <label>From</label>
                <input type="text" required class="form-control" name="r_from" id="r_from" placeholder="Origin" value="">
              </div>
              <div class="col-6">
                <label>To</label>
                <input type="text" required class="form-control" name="r_to" id="r_to" placeholder="Destination" value="">
              </div>
              <div class="col-6 mb-2">
                <label>Date and Time</label>
                <input type="datetime-local" required class="form-control" name="r_date" id="r_date" value="">
              </div>
              <div class="col-6 flight-form">
                <label>Class</label>
                <select class="form-control" required name="fl_r_class" id="fl_r_class">
                  <option value=""> Select Class</option>
                  <option value="Economy">Economy class</option>
                  <option value="Premium">Premium class</option>
                  <option value="Business">Business class</option>
                  <option value="First">First class</option>
                </select>
              </div>

              <div class="col-6 train-form">
                <label>Class</label>
                <select class="form-control" required name="tr_r_class" id="tr_r_class">
                  <option value=""> Select Class</option>
                  <option value="1A">First AC (1A)</option>
                  <option value="2A">Second AC (2A)</option>
                  <option value="FC">First Class (FC)</option>
                  <option value="3A">Third AC (3A)</option>
                  <option value="SL">Sleeper (SL)</option>
                </select>
              </div>

              <div class="col-6 bus-form">
                <label>Class</label>
                <select class="form-control" required name="bs_r_class" id="bs_r_class">
                  <option value=""> Select Class</option>
                  <option value="Seater">Seater</option>
                  <option value="Sleeper">Sleeper</option>
                  <option value="Seater AC">Seater AC</option>
                  <option value="Sleeper AC">Sleeper AC</option>
                </select>
              </div>

              <div class="col-6 taxi-form">
                <label>Car Type</label>
                <select class="form-control" required name="tx_r_class" id="tx_r_class">
                  <option value=""> Select type</option>
                  <option value="Hatchback">Hatchback</option>
                  <option value="Sedan">Sedan</option>
                  <option value="SUV">SUV</option>
                </select>
              </div>

            </div>
            <br>
            <center>
              <button type="button" class="btn btn-secondary closeService" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary addService">Add</button>
            </center>
            <br>
          </form>
        </div>
        <!-- <div class="modal-footer">
            
          </div> -->
      </div>
    </div>
  </div>