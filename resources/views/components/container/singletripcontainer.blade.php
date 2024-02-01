<div>
    <div class="row">
        <div class="col-6">
            <label>From</label>
            <input type="text" required class="form-control from" name="from" id="from" placeholder="Origin">
        </div>
        <div class="col-6">
            <label>To</label>
            <input type="text" required class="form-control to" name="to" id="to"  placeholder="Destination">
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
                {{-- <option value="Premium">Premium class</option>
                <option value="Business">Business class</option>
                <option value="First">First class</option> --}}
            </select>
        </div>
        @if ($tripDetails[0]['trip_type'] === 'international')
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
                @if(in_array(ucfirst($usergrade),['L0','L1','L2']))
                <option value="1A">First AC (1A)</option>
                @endif
                @if(!in_array(ucfirst($usergrade),['L5','L6','L7','L8']))
                <option value="2A">Second AC (2A)</option>
                @endif
                {{-- <option value="FC">First Class (FC)</option> --}}
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