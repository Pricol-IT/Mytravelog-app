<div class="modal fade" id="extra-form-modal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title "></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='extra-service-form' action="#">
                    <input type="hidden" value="" class="extraService">
                    <div class="row">
                        <div class="row taxi-form">
                            <div class="col-6 p-2">
                                <input class="form-check-input" type="checkbox" value="airport pickup" id="airportPickup">
                                <label class="form-check-label" for="airportPickup">
                                    Airport <i class="bi bi-arrow-left-right"></i> Hotel
                                </label>
                            </div>
                            <div class="col-6 p-2">
                                <input class="form-check-input" type="checkbox" value="hotel pickup" id="hotelPickup">
                                <label class="form-check-label" for="hotelPickup">
                                    Hotel <i class="bi bi-arrow-left-right"></i> Company
                                </label>
                            </div>
                            <div class="col-6 p-2">
                                <input class="form-check-input" type="checkbox" value="Car Rental" id="carRental">
                                <label class="form-check-label" for="carRental">
                                    Car Rental
                                </label>
                            </div>


                            <hr class="carRentalSection">
                            <div class="col-6 carRentalSection">
                                <label>Number of days</label>
                                <input type="text" required class="form-control" name="location" id="location" placeholder="Enter No.of.days">
                            </div>
                            <div class="col-6 carRentalSection">
                                <label>Class</label>
                                <select class="form-control" required name="tx_class" id="tx_class">
                                    <option value=""> Select type</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="SUV">SUV</option>
                                </select>
                            </div>
                            <div class="col-6 carRentalSection">
                                <label>Pickup Date and Time</label>
                                <input type="datetime-local" required class="form-control" name="date" id="date">
                            </div>
                            <div class="col-6 carRentalSection">
                                <label>Drop Date and Time</label>
                                <input type="datetime-local" required class="form-control" name="date" id="date">
                            </div>
                        </div>


                        <div class="col-6 hotel-form">
                            <label>Location</label>
                            <input type="text" required class="form-control" name="location" id="location" placeholder="preferred location">
                        </div>
                        <div class="col-6 hotel-form">
                            <label>Hotel name</label>
                            <input type="text" required class="form-control" name="hotelName" id="hotelName" placeholder="preferred hotel name">
                        </div>
                        <div class="col-6 mb-2 hotel-form">
                            <label>Check In</label>
                            <input type="datetime-local" required class="form-control" name="checkIn" id="checkIn">
                        </div>
                        <div class="col-6 mb-2 hotel-form">
                            <label>Check Out</label>
                            <input type="datetime-local" required class="form-control" name="checkOut" id="checkOut">
                        </div>
                        <div class="col-6 mb-2 advance-form">
                            <label>Amount</label>
                            <input min="5000" max="10000" type="number" id="amount" class="form-control" placeholder="Enter the Amount" />
                            {{-- <input type="text" required class="form-control" name="amount" id="amount" placeholder="Enter the Amount"> --}}
                            <small class="text-muted">Your advance eligibility is ₹10,000.</small>
                        </div>
                        <div class="col-6 advance-form">
                            <input class="form-check-input" type="checkbox" value="special approval" id="specialApproval">
                            <label class="form-check-label" for="specialApproval">
                                Special Approval
                            </label><br>
                            <small class="text-muted"><i class="bi bi-info-circle"></i> if request is over the advance limit use special approval</small>
                            <label class="specialApprovalForm">Amount</label>
                            <input type="text" required class="form-control specialApprovalForm" name="splAdvance" id="splAdvance" placeholder="Enter the amount">
                        </div>
                        {{-- <div class="col-6 mb-2 advance-form">
                            <label>Purpose</label>
                            <input type="text" required class="form-control" name="purpose" id="purpose" placeholder="Enter purpose">
                        </div> --}}

                        <div class="col-6 mb-2 network-form">
                            <label>International roaming</label>
                            <input type="text" required class="form-control" name="network" id="network" placeholder="Enter the no.of.days">
                        </div>
                        <div class="col-6 mb-2 network-form">
                            <label>Mobile Number</label>
                            <input type="text" required class="form-control" name="phoneno" id="phoneno" placeholder="Mobile number">
                        </div>
                        <div class="col-6 mb-2 forex-form">
                            <label>convert currency to</label>
                            <select class="form-control" required name="currency" id="currency">
                                <option value=""> Select currency</option>
                                <option value="USD">Dollar</option>
                                <option value="EUR">Euro</option>
                                <option value="JPY">yen</option>
                                <option value="SGD">Singapore Dollar</option>
                            </select>
                        </div>
                        <div class="col-6 mb-2 forex-form">
                            <label>Amount</label>
                            <input type="text" required class="form-control" name="forex_amount" id="forex_amount" placeholder="Enter the Amount">
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

        </div>
    </div>
</div>
