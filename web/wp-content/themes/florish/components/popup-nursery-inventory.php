<!-- Nursery Inventory List-->
<div id="view-nursery-inventory-popup" class="white-popup mfp-hide">
	<div class="inv-popup">
		<h3>Select Your Inventory</h3>
		<div class="search-bar">
			<input type="text" placeholder="Search..." id="search_plants" class="form-control search-plants" />
		</div>
		<form method="post" action="" id="AddInventory" novalidate="novalidate">
			<div class="master-plant">

			</div>
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12"></div>
				<div class="col-lg-8 col-md-12 col-sm-12">
					<ul class="pl_btns">
						<li><button>+ Add A New Plant</button></li>
						<li><button name="all_done" onclick="return confirm('Are you sure to select plants is confirm going to live?')">All done!</button></li>
					</ul>
				</div>
			</div>
		</form>

	</div>
</div>
