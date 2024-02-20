<!-- market edit-->
<div id="edit-market-popup" class="white-popup mfp-hide">
	<div class="market-wrap">
		<h3>Update market</h3>

		<form method="post" action="" id="updateMarkets" novalidate="novalidate">

			<input type="hidden" id="market_id1" name="market_id" />
			<input type="hidden" id="latitude1" name="latitude1" />
			<input type="hidden" id="longitude1" name="longitude1" />
			<input type="hidden" id="fulladdress1" name="fulladdress1" />
			<input type="hidden" id="zipcode1" name="zipcode1" />
			<div class="input-fld">
				<label>Market name:</label>
				<div class="input-control">
					<input type="text" name="market_name1" id="market_name1" class="form-control" required />
					<span class="name-field-error" id="field-error"></span>
				</div>
			</div>
			<div class="input-fld">
				<label>Radius (miles):</label>
				<div class="input-control">
					<input type="number" name="radious_miles1" id="radious_miles1" class="form-control" value="10" />
					<span class="name-field-error" id="miles-field-error"></span>
				</div>
			</div>
			<div class="input-fld">
				<label>Take Rate (%):</label>
				<div class="input-control">
					<input type="number" name="take_rate1" id="take_rate1" class="form-control" value="" />
					<span class="name-field-error" id="rate-field-error"></span>
				</div>
			</div>
			<div class="input-fld" id="pac-card">
				<label>Set center pin:</label>
				<div id="input-control" class="input-control">
					<input id="pac-input1" class="controls form-control full-address" type="text" readonly placeholder="Enter a location">
					<div id="location-error" class="name-field-error"></div>
				</div>
			</div>
			<!-- <div class="input-fld">
            <input type="range" class="field"  id="radius1" name="radius" min="0" max="100" value="10" onchange="updateRadius()">
         </div> -->
			<div class="submit-fld">
				<button name="update_market" id="update_markets" type="hidden"></button>
				<a href="JavaScript:void(0)" id="update_market">Update</a>
			</div>
		</form>

	</div>
</div>
