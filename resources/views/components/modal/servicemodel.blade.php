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
                            <small class="text-muted">The maximum amount available for advance eligibility is ₹10,000.</small>
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
