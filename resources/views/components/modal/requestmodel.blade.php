<div class="modal fade fmodal" id="form-modal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='service-form' action="#">

                    <div class=" row">

                        <input type="hidden" value="" class="vehicle">
                        <div class="col-12 text-center p-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tripmode" id="onward" value="onward">
                                <label class="form-check-label" for="onward">One way</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tripmode" id="return" value="return">
                                <label class="form-check-label" for="return">Round trip</label>
                            </div>
                            @if ($tripDetails[0]['tripType'] === 'international')
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tripmode" id="multicity" value="multicity">
                                <label class="form-check-label" for="multicity">Multi-city</label>
                            </div>
                            @endif
                        </div>

                        <div class="col-12 onward-form">
                            <div class="row">
                                <div class="col-6">
                                    <label>From</label>
                                    <input type="text" required class="form-control from" name="from" id="from" placeholder="Origin">
                                </div>
                                <div class="col-6">
                                    <label>To</label>
                                    <input type="text" required class="form-control to" name="to" id="to" placeholder="Destination">
                                </div>
                                <div class="col-6 mb-2">
                                    <label>Date and Time</label>
                                    <input type="datetime-local" required class="form-control date" name="date" id="date">
                                </div>
                                <div class="col-6 flight-form">
                                    <label>Class</label>
                                    <select class="form-control fl_class" required name="fl_class" id="fl_class">
                                        <option value=""> Select Class</option>
                                        <option value="Economy">Economy class</option>
                                        <option value="Premium">Premium class</option>
                                        <option value="Business">Business class</option>
                                        <option value="First">First class</option>
                                    </select>
                                </div>
                                @if ($tripDetails[0]['tripType'] === 'international')
                                <div class="col-6 flight-form">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" data-toggle="tooltip" data-placement="top" title="Visa Applied">
                                            Visa
                                        </label>
                                    </div>
                                </div>
                                @endif

                                <div class="col-6 train-form">
                                    <label>Class</label>
                                    <select class="form-control tr_class" required name="tr_class" id="tr_class">
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
                                    <select class="form-control bs_class" required name="bs_class" id="bs_class">
                                        <option value=""> Select Class</option>
                                        <option value="Seater">Seater</option>
                                        <option value="Sleeper">Sleeper</option>
                                        <option value="Seater AC">Seater AC</option>
                                        <option value="Sleeper AC">Sleeper AC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 return-form">
                            <h5 class="text-center p-2 text-primary ">Onward</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label>From</label>
                                    <input type="text" required class="form-control from" name="from" id="from" placeholder="Origin">
                                </div>
                                <div class="col-6">
                                    <label>To</label>
                                    <input type="text" required class="form-control to" name="to" id="to" placeholder="Destination">
                                </div>
                                <div class="col-6 mb-2">
                                    <label>Date and Time</label>
                                    <input type="datetime-local" required class="form-control date" name="date" id="date">
                                </div>
                                <div class="col-6 flight-form">
                                    <label>Class</label>
                                    <select class="form-control fl_class" required name="fl_class" id="fl_class">
                                        <option value=""> Select Class</option>
                                        <option value="Economy">Economy class</option>
                                        <option value="Premium">Premium class</option>
                                        <option value="Business">Business class</option>
                                        <option value="First">First class</option>
                                    </select>
                                </div>
                                @if ($tripDetails[0]['tripType'] === 'international')
                                <div class="col-6 flight-form">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" data-toggle="tooltip" data-placement="top" title="Visa Applied">
                                            Visa
                                        </label>
                                    </div>
                                </div>
                                @endif

                                <div class="col-6 train-form">
                                    <label>Class</label>
                                    <select class="form-control tr_class" required name="tr_class" id="tr_class">
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
                                    <select class="form-control bs_class" required name="bs_class" id="bs_class">
                                        <option value=""> Select Class</option>
                                        <option value="Seater">Seater</option>
                                        <option value="Sleeper">Sleeper</option>
                                        <option value="Seater AC">Seater AC</option>
                                        <option value="Sleeper AC">Sleeper AC</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="text-center p-2 text-primary ">Return</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label>From</label>
                                    <input type="text" required class="form-control from" name="from" id="from" placeholder="Origin">
                                </div>
                                <div class="col-6">
                                    <label>To</label>
                                    <input type="text" required class="form-control to" name="to" id="to" placeholder="Destination">
                                </div>
                                <div class="col-6 mb-2">
                                    <label>Date and Time</label>
                                    <input type="datetime-local" required class="form-control date" name="date" id="date">
                                </div>
                                <div class="col-6 flight-form">
                                    <label>Class</label>
                                    <select class="form-control fl_class" required name="fl_class" id="fl_class">
                                        <option value=""> Select Class</option>
                                        <option value="Economy">Economy class</option>
                                        <option value="Premium">Premium class</option>
                                        <option value="Business">Business class</option>
                                        <option value="First">First class</option>
                                    </select>
                                </div>
                                @if ($tripDetails[0]['tripType'] === 'international')
                                <div class="col-6 flight-form">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" data-toggle="tooltip" data-placement="top" title="Visa Applied">
                                            Visa
                                        </label>
                                    </div>
                                </div>
                                @endif

                                <div class="col-6 train-form">
                                    <label>Class</label>
                                    <select class="form-control tr_class" required name="tr_class" id="tr_class">
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
                                    <select class="form-control bs_class" required name="bs_class" id="bs_class">
                                        <option value=""> Select Class</option>
                                        <option value="Seater">Seater</option>
                                        <option value="Sleeper">Sleeper</option>
                                        <option value="Seater AC">Seater AC</option>
                                        <option value="Sleeper AC">Sleeper AC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 multicity-form">
                            <div class="multicity-area">
                                <div class="row multicity-section">
                                    <div class="col-12 p-2">
                                        <hr>
                                        <h6 class="text-center p-2 text-primary d-inline">Flight <span>1</span></h6>
                                        <button type="button" class="removeCloneButton btn btn-outline-danger btn-sm float-end"> <i class="bi bi-x"></i></button>
                                    </div>
                                    <div class="col-6">
                                        <label>From</label>
                                        <input type="text" required class="form-control from" name="from" id="from" placeholder="Origin">
                                    </div>
                                    <div class="col-6">
                                        <label>To</label>
                                        <input type="text" required class="form-control to" name="to" id="to" placeholder="Destination">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label>Date and Time</label>
                                        <input type="datetime-local" required class="form-control date" name="date" id="date">
                                    </div>
                                    <div class="col-6 flight-form">
                                        <label>Class</label>
                                        <select class="form-control fl_class" required name="fl_class" id="fl_class">
                                            <option value=""> Select Class</option>
                                            <option value="Economy">Economy class</option>
                                            <option value="Premium">Premium class</option>
                                            <option value="Business">Business class</option>
                                            <option value="First">First class</option>
                                        </select>
                                    </div>

                                    @if ($tripDetails[0]['tripType'] === 'international')
                                    <div class="col-6 flight-form">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault" data-toggle="tooltip" data-placement="top" title="Visa Applied">
                                                Visa
                                            </label>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <button class="btn btn-outline-primary btn-sm float-end" type="button" id="addButton"><i class="bi bi-plus-lg"></i> Add Flight</button>
                        </div>

                        <div class="col-12 preferences">
                            <label>Preferences</label>
                            <textarea name="preferences" id="preferences" class="form-control"></textarea>
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
