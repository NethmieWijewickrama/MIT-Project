const loadingWidget = {
	show: function () {
		$("#loader").addClass("loader");
	},
	hide: function () {
		$("#loader").removeClass("loader");
	},
};

var myTableArray = [];

let rowCount = 0;

function removeRecord(itemCode) {

	let parentId = 'item' + itemCode;

	$('#item' + itemCode).remove();

}


(function ($) {
	"use strict";
	$(function () {

		const salesTransObj = {
			$btnAdd: $("#btn_add"),
			$btnRemove: $("#btn_add"),
			$btnSaveTans: $("#btn_save_tans"),
			$table: $("#data_table"),


			$activeCode: $("#activeCode"),
			$vesselID: $("#vesselID"),
			$departureDate: $("#departureDate"),
			$harbour: $("#harbour"),
			$skipperID: $("#skipperID"),
			$fishermenID: $("#fishermenID"),
			$fishingGear: $("#fishingGear"),


			$spinner: $("#loader"),
			$crewID: $("#crewID"),

			init: function () {
				this.handleEvents();
			},
			handleEvents: function () {
				const context = this;
				this.$btnAdd.on("click", function (e) {
					e.preventDefault();
					context.addNewTranRecord();
				});
				this.$btnSaveTans.on("click", function (e) {
					e.preventDefault();

					if ($('#data_table tbody tr').length > 0) {
						Swal.fire({
							title: 'Are you sure?',
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes, Save it!'
						}).then((result) => {
							if (result.value) {
								context.saveTranRecords();
							}
						})
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'please add records before submit!',
						})
					}
				});

			},
			addNewTranRecord: function () {
				this.getItemDetails();
			},
			getItemDetails: function () {
				loadingWidget.show();
				const context = this;
				$.get(
					baseUrl + "get_fishermen_details?id=" + context.$crewID.val(),
					function (res) {
						context.addNewRecord($.parseJSON(res));
					}
				).fail(function (error) {
					console.log("error", error);
					loadingWidget.hide();
				});
			},
			addNewRecord: function (data) {
				++rowCount;
				this.$table.append(
					`<tr class='data_row' id='item` + rowCount + `' >` +
					`<td class='crew_id' style="display:none;">` + data.id + `</td>` +
					`<td class='crew_name'>` + data.nameInFull + `</td>` +
					`<td class='crew_nic'>` + data.nic + `</td>` +
					`<td> <button type='button' class = 'btn btn-danger'  onClick='removeRecord("` + rowCount + `")'> <i class='fa fa-trash' aria-hidden='true'></i> </button>` + `</td>` +
					+`<tr>`
				)
				loadingWidget.hide();
			},
			saveTranRecords: function () {

				$('#data_table tbody tr').each(function () {
					var arrayOfThisRow = [];

					arrayOfThisRow[0] = $(this).find(".crew_id").html();
					myTableArray.push(arrayOfThisRow);
				});

				console.log(myTableArray)

				$.post(
					baseUrl + "save_departure",
					{
						activeCode: this.$activeCode.val(),
						vesselID: this.$vesselID.val(),
						harbour: this.$harbour.val(),
						departureDate: this.$departureDate.val(),
						fishingGear: this.$fishingGear.val(),
						skipperID: this.$skipperID.val(),
						crew_list: JSON.stringify(myTableArray)
					},
					function (result) {

						var res = $.parseJSON(result);

						if (res.status == 1) {
							Swal.fire({
								title: 'Departure added Successfully...',
								confirmButtonText: `OK`,
								icon: 'success'
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.href = baseUrl+"high_sea_form?id=" + res.trans_id;
								}
							})
						}
					}
				).fail(function (error) {
					console.log("error", error);
					loadingWidget.hide();
				});

			},
		};
		salesTransObj.init();

	});

})(jQuery);
