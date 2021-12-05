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

	let grand_total_lkr = $("#grand_total_lkr");
	let grand_total_usd = $("#grand_total_usd");
	//let exchangeRate = $("#exchangeRate");

	grand_total_usd.val(grand_total_usd.val() - $('#' + parentId + '> .unit_price').html());
	grand_total_lkr.val(grand_total_lkr.val() - $('#' + parentId + '> .unit_price').html() * usd);
	//exchangeRate.val(exchangeRate.val() - $('#' + parentId + '> .exchangeRate').html());
	//grand_total_lkr.val(grand_total_lkr.val() - $('#' + parentId + '> .unit_price').html() * exchangeRate);

	$('#item' + itemCode).remove();

}


(function ($) {
	"use strict";
	$(function () {

		const salesTransObj = {
			$btnAdd: $("#btn_add"),
			$btnRemove: $("#btn_add"),
			$btnSaveTans: $("#btn_save_tans"),
			$grand_total_usd: $("#grand_total_usd"),
			$grand_total_lkr: $("#grand_total_lkr"),
			//$exchangeRate : $("#exchangeRate"),
			$txt_tax_amt: $("#tax_amt"),
			$txt_total_discount: $("#total_discount"),
			$txt_net_total: $("#net_total"),
			$item_code: $("#item_code"),
			$item_qty: $("#item_qty"),
			$item_discount: $("#item_discount"),
			$table: $("#data_table"),

			$invNo: $("#inv_no"),
			$invDate: $("#inv_date"),
			$startDate: $("#start_date"),
			$endDate: $("#end_date"),
			//$exchangeRate: $("#exchangeRate"),
			$vesselID: $("#vesselID"),
			$ownerID: $("#ownerID"),
			$cusTel: $("#cus_tel"),

			$grossTotal: 0,
			$qtyTotal: 0,
			$discountTotal: 0,
			$netTotal: 0,
			$spinner: $("#loader"),

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
					baseUrl + "get_unit_price?data_type=" + context.$item_code.val(),
					function (res) {
						context.addNewRecord($.parseJSON(res));
					}
				).fail(function (error) {
					console.log("error", error);
					loadingWidget.hide();
				});
			},
			addNewRecord: function (data) {
				var total = 0;
				var qty = 1;

				++rowCount;

				if (this.$item_qty.val() > 0) {
					total = data.unitPrice * this.$item_qty.val();
				} else {
					total = data.unitPrice;
				}

				if (this.$item_qty.val() > 0)
					qty = this.$item_qty.val();

				this.$table.append(
					`<tr class='data_row' id='item` + rowCount + `' >` +
					`<td class='item_code'>` + data.dataType + `</td>` +
					`<td class='item_code_id' style="display:none;">` + data.id + `</td>` +
					`<td class='unit_price'>` + data.unitPrice + `</td>` +
					`<td class='unit_qty'>` + qty + `</td>` +
					`<td class='unit_total'>` + total + `</td>` +
					`<td> <button type='button' class = 'btn btn-danger'  onClick='removeRecord("` + rowCount + `")'> <i class='fa fa-trash' aria-hidden='true'></i> </button>` + `</td>` +
					+`<tr>`
				)

				this.$grand_total_usd.val(Number(this.$grand_total_usd.val()) + Number(total));
				this.$grand_total_lkr.val(Number(this.$grand_total_lkr.val()) + Number(total) * usd);
		
				//this.$grand_total_lkr.val(Number(this.$grand_total_lkr.val()) + Number(total) * exchangeRate);

				loadingWidget.hide();

				this.$item_qty.val('');
				this.$item_discount.val('');
			},
			saveTranRecords: function () {

				$('#data_table tbody tr').each(function () {
					var arrayOfThisRow = [];

					arrayOfThisRow[0] = $(this).find(".item_code_id").html();
					arrayOfThisRow[1] = $(this).find(".unit_qty").html();
					arrayOfThisRow[2] = $(this).find(".unit_price").html();
					arrayOfThisRow[3] = $(this).find(".unit_total").html();
					myTableArray.push(arrayOfThisRow);
				});

				$.post(
					baseUrl + "save_transaction",
					{
						invoiceNumber: this.$invNo.val(),
						invoiceDate: this.$invDate.val(),
						usageMonthStartDate: this.$startDate.val(),
						usageMonthEndDate: this.$endDate.val(),
						TotalAmtUSD: this.$grand_total_usd.val(),
						//ExchangeRate: this.$exchangeRate.val(),
						TotalAmtLKR: this.$grand_total_lkr.val(),
						vesselID: this.$vesselID.val(),
						ownerID: this.$ownerID.val(),
						item_list: JSON.stringify(myTableArray)
					},
					function (result) {

						var res = $.parseJSON(result);

						if (res.status == 1) {
							Swal.fire({
								title: 'Transaction added Successfully...',
								confirmButtonText: `OK`,
								icon: 'success'
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.href = baseUrl+"invoice?id=" + res.trans_id;
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
