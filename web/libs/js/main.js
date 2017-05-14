				/**********************		ALL MAIN FUnctions Thar Redundant For ALL Pages     *********************/
				/* There are ( 4 ) main Prototypes																   	*/
				/*  		MAIN : To work with the index and other files with their processes 						*/
				/*DATATABLESJOBS : To make Data Tables work like initialization , delete , insert , update 			*/
				/*	   TEMPLATES : To make HTML templates such as alerts messages ....                   			*/
				/*		  SERVER : To call The SERVER with POST , GET , DELETE , PUT ,... 							*/
				/***************************************************************************************************/
MAIN = function(){
	this.url = window.location.href;
	this.chosenInit = function(){
		$('.chosen-select').chosen();
		$('.chosen-select-deselect').chosen({ allow_single_deselect: true,no_results_text: "لا توجد نتائج مقترحة لهذا العنصر" });
		$(".base-select").focusout(function(){
			get_att = $(this).attr('get');
			to = $(this).attr('to');
			module = get_att.split("-")[0];
			method = get_att.split("-")[1];
			input = {};
			name = $(this).attr("name");
			length = name.split("-").length;
			if (length > 1) {
				name = name.split("-")[0];
			}
			input[name] = $(this).val();
			main.base_select(module , method, to , input);
		});
	}
	this.addInit = function(){
		$('[data-toggle="popover"]').popover();
		$('.add-remove-row-'+params.counter).click(function(){
			$(".add-row-"+params.counter).remove();
		});
		this.chosenInit();
	}
	this.init = function(){
		$(".input").val("");
		this.addInit();
		$(".datatable").dataTable();
		DT.init();
	}
	this.isset = function(variable){
		if (variable != undefined && variable != "undefined") {
			return true;
		}
		return false;
	}
	this.isEmpty = function(variable){
		if (variable != "" && variable != " " && variable != 0 && variable != null && variable != "null") {
			return false;
		}
		return true;
	}
	this.formReset = function(form_id){
		$(".input").val("");
		$(".add-row").remove();
		$(".new-row").remove();
		$("#tab-pane-init").click();
		delete(params.counter);
		DT.viewed_element = "";
	}
	this.getModule = function(){
		url = this.url.replace('/index','');
		url = url.replace('/sales','');
		splitted  = url.split("/");
		module = splitted[splitted.length-1];
		module = module.split("#");
		module = module[0];
		return module;
	}
	this.confirm = function(msg ,success_cb , fail_cb){
		result = confirm(msg);
		if (result == true) {
			success_cb();
		}else{
			fail_cb();
		}
	}
	this.getInputs = function(form_id){
		data = {};
		table = {};
		form_data = new FormData();
		$("#"+form_id+" .input").each(function() {
			if (main.isset($(this).attr('name'))) {
				name = $(this).attr('name');
				value = $(this).val();
				data[name] = value;
				form_data.append(name , value);
				if (main.isset($(this).attr('table'))) {
					table_header = $(this).attr("table");
					table[table_header] = value ;
				}
			};
		});
		if (this.isset(params.counter)) {
			data.counter = params.counter;
			form_data.append("counter",params.counter);
		}
		return {data:data , form_data:form_data , table_data:table};
	}
	this.fillForm = function(data){
		
		$("#"+this.getModule()+"-form .input").each(function(index) {
			name = $(this).attr('name');
			$(this).val(data[name]);
		});
	}
	this.validateForm = function (form_id){
		ref = true;
		$("#"+form_id+" .input ").each(function() {
			if ($(this).prop('required') && ($(this).val() == "" || $(this).val() == 0)){
				$(this).popover('show');
				$(this).focus(function(event) {
					$(this).popover('destroy');
				});

				ref = false;
				console.log($(this).attr("name"),ref);
			}
		});
		return ref ;
	}
	this.showNotification = function(html){
		$("html").append(html);
		setTimeout(function(){
			$(".notification").fadeOut('slow');
			$(".notification").remove();
		},2000)
	}
	this.add = function(module){
		if (!this.isset(params.counter)) {
			params.counter = 0;
		}
		params.counter++ ;
		if (module == "units") {
			tpl.units(function(tpl){
				$("#after-counting-area").before(tpl);
				main.addInit();
			});
		}
		if (module == "purchasing_bill"){
			$("#after-counting-area").before(tpl.purchasing_bill());
			main.addInit();
		}
	}
	this.create = function(inputs , url ,msg ,err_msg ){
		$(".spinny").modal('show');
		server.create(url , inputs , function(data){
			$(".spinny").modal('hide');
			main.showNotification(tpl.success(msg));
			main.formReset(form_id);
			DT.refresh();
		} , function(error){
			$("	.spinny").modal('hide');
			main.showNotification(tpl.fail(err_msg));
		});
	}
	this.delete = function(id){
		this.confirm("هل تريد حذف هذا العنصر حقا ... ؟" , function(){
			server.delete(main.getModule() , id ,function(){
				main.showNotification(tpl.success("تمت عملية الحذف بنجاح"));
				if (main.getModule() == "selling-bills") {
					location.reload();
				};
				DT.refresh();
			},function(){
				main.showNotification(tpl.fail("حدث خطأ في الحذف من فضلك تحقق من متعلقات العنصر المراد حذفه ثم أعد المحاولىة"));
			});
		},function(){});
	}
	this.view = function(id){
		DT.viewed_element = id;
		server.getElement(id,main.getModule(),function(data){
			main.fillForm(data);
			$(".submit").addClass('hidden');
			$(".submit-delete,.submit-update,.submit-new").removeClass('hidden');
		},function(err){
			main.showNotification(tpl.fail("حدث خطأ أثناء تحديد العنصر من فضلك أعد تحميل الصفحة للتأكد من وجود العنصر الصحيح"));
		});
	}
	this.update = function(inputs , module ,msg ,err_msg){
		id = DT.viewed_element;
		$(".spinny").modal('show');
		server.update(id,module,inputs,function(data){
			$(".spinny").modal('hide');
			main.showNotification(tpl.success(msg)); 
			DT.refresh();
		},function(err){
			$("	.spinny").modal('hide');
			main.showNotification(tpl.fail(err_msg));
		});
	}
	this.details = function(id){
		$(".spinny").modal('show');
		server.details(main.getModule(),id,function(data){
			det = "";
			for (var i = 0; i < data.length; i++) {
				det = det + tpl.details(data[i]);
			}
			$("#dets").html(det);
			$("#details").modal('show');
			$(".spinny").modal('hide');
		},function(err){
			$(".spinny").modal('hide');
		});
	}
	this.base_select = function(module , method , to , inputs){
		server.get(module , method ,inputs ,function(data){
			template = tpl.base_select(module , method,data );
			$("."+to).html(template);
			$('.chosen-select').chosen();
			$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		},function(err){
			tpl.fail("للأسف هذا العنصر غير موجود");
		});
	}
}
DATATABLESJOBS = function(){
	this.module = main.getModule();
	this.table = $("#datatable");
	this.viewed_element = "";
	this.init = function(){
		data_table =  this.table.dataTable({
			"retrieve": true,
			"bProcessing": true,
			"sAjaxSource": "/superdev/web/"+this.module+"/all",
			"columns": DT.moduleColumns(),
			oLanguage:{
				"sEmptyTable": "لا يوجد بيانات",
				"sProcessing": "جاري التحميل...",
                "sLengthMenu": "أظهر : _MENU_ مُدخلات ",
                "sZeroRecords": "لا توجد بيانات...",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجلّ",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": " ابحث هنا : ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                }
			}
		});

	}
	this.refresh = function(data){
		this.table.dataTable().fnDestroy();
		this.init();
	}
	this.controls = function(){
		$(".row-delete,.row-edit,.row-view").click(function() {
			element  = $(this).attr('element');
		});
	}
	this.moduleColumns = function(){
		if (main.getModule() == "items") {
			return  [
			            { 	"data" : "item_name" },
			            { 	"data" : "item_code" },
			            { 	"data" : "price" },
			            { 	"data" : "quantity" },
			            { 	"data" : "less_quantity" },
			            { 
			            	"data" : "id" 
			            	,
			            	"render" : function(data){
			            		del = tpl.delete_control(data);
			            		edit = tpl.edit_control(data);
			            		return  del + edit ;
			            	}
			        	},
		        	]
		}
		if (main.getModule() == "units") {
			return  [
			            { 	"data" : "unit_name" },
			            { 
			            	"data" : "id" 
			            	,
			            	"render" : function(data){
			            		del = tpl.delete_control(data);
			            		edit = tpl.edit_control(data);
			            		return  del + edit ;
			            	}
			        	},
		        	]
		}
		if (main.getModule() == "suppliers") {
			return  [
			            { 	"data" : "name" },
			            { 	"data" : "supplier_code" },
			            { 	"data" : "Address" },
			            { 	"data" : "company" },
			            { 	"data" : "balance" },
			            { 
			            	"data" : "id" 
			            	,
			            	"render" : function(data){
			            		console.log (data);
			            		del = tpl.delete_control(data);
			            		edit = tpl.edit_control(data);
			            		details = tpl.details_control(data);
			            		return  del + edit + details ;
			            	}
			        	},
		        	]
		}
		if (main.getModule() == "purchasing-bills") {
			return  [
			            { 	"data" : "bill_code" },
			            { 	"data" : "supplier" },
			            { 	"data" : "total_cost" },
			            { 	"data" : "total_discount" },
			            { 
			            	"data" : "id" 
			            	,
			            	"render" : function(data){
			            		del = tpl.delete_control(data);
			            		// edit = tpl.edit_control(data);
			            		details = tpl.details_control(data);
			            		return  del /*+ edit */+ details ;
			            	}
			        	},
		        	]
		}
		if (main.getModule() == "selling-bills") {
			return  [
				{	"data" : "bill_code" },
				{	"data" : "total_price" },
				{	"data" : "total_discount" },
				{
					"data" : "id" ,
					"render" : function(data){
						del = tpl.delete_control(data);
						details = tpl.details_control(data);
						if (!main.isset(params.total)) {
							params.total = params.total+data.total_price;
						};
						
						return  del /*+ edit */+ details ;
					}
				},
			]
		}
	}
}
TEMPLATES = function(){
	this.success = function(msg){
		return "<div class=\"notification alert alert-success\">"+ msg +"</div>";
	}
	this.fail = function(err_msg){
		return "<div class=\" notification alert alert-danger\">"+ err_msg +"</div>";
	}
	this.delete_control = function(id){
		return " <a href=\"javascript:void(0);\"  element=\""+id+"\" onclick=\"main.delete("+id+")\" class=\"row-delete btn btn-danger\" title=\"حذف\"><i class='fa fa-trash' ></i></a> ";
	}
	this.edit_control = function(id){
		return " <a href=\"javascript:void(0);\"  element=\""+id+"\" onclick=\"main.view("+id+")\" class=\"row-edit btn btn-success\" title=\"تعديل\"><i class='fa fa-edit' ></i></a> "
	}
	this.view_control = function(id){
		return " <a href=\"javascript:void(0);\"  element=\""+id+"\" onclick=\"main.view("+id+")\" class=\"row-view btn btn-warning\" title=\"عرض\"><i class='fa fa-eye' ></i></a> "
	}
	this.details_control = function(id){
		return " <a href=\"javascript:void(0);\"  element=\""+id+"\" onclick=\"main.details("+id+")\" class=\"row-view btn btn-info\" title=\"التفاصيل\"><i class='fa fa-list' ></i></a> "
	}
	this.units = function(callBack){
		counter = params.counter;
		units = server.all("units",function(data){
			data = data.data;
			params.calculate = {};
			options ="";
			for (element in data) {
				options += "<option value=\""+data[element].id+"\">"+data[element].unit_name+"</option>\n";
			}
			select = "<div class=\"row add-row add-row-"+counter+"\" dir=\"rtl\">\n"+
					  "<div class=\"col-xs-1\">\n"+
					  	"<i class=\" fa fa-remove btn btn-info add-remove-row-"+counter+"\"></i>\n"+
					  "</div>\n"+
                  	  "<div class=\"col-xs-2\">\n"+
                  	    "<input type=\"text\" class=\"form-control input\" name=\"sub-units-item-quantity-"+counter+"\" placeholder=\"الكمية من الصنف\" >"+
                  	  "</div>\n"+
                  	  "<div class=\"col-xs-1\">\n"+
                  	  	"الكمية من الصنف \n"+
                  	  "</div>"+
	                  "<div class=\"col-xs-2\">\n"+
	                  " <input type=\"number\" class=\"form-control input\" name=\"sub-units-quantity-"+counter+"\" placeholder=\"الكمية\"> \n"+
	                  "</div>\n"+
	                  "<div class=\"col-xs-2\">\n"+
	                  "الكمية من الوحدة السابقة\n"+
	                  "</div>\n"+
	                  "<div class=\"col-xs-2\">\n"+
	                  	"<select data-placeholder=\"اختر الوحدة\" class=\"chosen-select input\" name=\"sub-unit-"+counter+"\" tabindex=\"4\">\n"+
	                  		"<option></option>\n"+
	                  		options+
	                  	"</select>\n"+
	                  "</div>"+
	                  "<div class=\"col-md-2 col-xs-2\" >\n"+
	                        "الوحدة الجزئية ( "+ counter +" )\n"+
                  	 " </div>\n"+
                  	 "<br><br>\n";
			callBack(select);
		},function(error){
			main.showNotification(tpl.fail("حدث خطأ في إضافة الوحدة من فضلك أعد تحميل الشاشة ثم اعد العملية من جديد"));
		});
	}
	this.purchasing_bill = function(){
		counter = params.counter;
		row = "		<div class=\"row add-row add-row-"+counter+"\" dir=\"rtl\">\n"+
                    	"<br>"+
                    	"<div class=\"col-xs-1\">\n"+
					  		"<i class=\" fa fa-remove btn btn-info add-remove-row-"+counter+"\"></i>\n"+
					  	"</div>\n"+
					  	"<div class=\"col-xs-1\">\n"+
                  	    	"<input type=\"text\" class=\"form-control input\" name=\"cost-"+counter+"\" placeholder=\"التكلفة\" >"+
                  	  	"</div>\n"+
                  	  	"<div class=\"col-xs-1\">\n"+
                  	  		"التكلفة \n"+
                  	  	"</div>"+
                  	  	"<div class=\"col-xs-2\">\n"+
                  	    	"<input type=\"text\" class=\"form-control input\" name=\"quantity-"+counter+"\" placeholder=\"الكمية\" >"+
                  	  	"</div>\n"+
                  	  	"<div class=\"col-xs-1\">\n"+
                  	  		"الكمية \n"+
                  	  	"</div>"+
                    	"<div class=\"col-xs-2\" >\n"+
	                        "<span class=\"based-units-"+counter+"\" >\n"+
	                            "<select  data-placeholder=\"الوحدة\" name=\"units-"+counter+"\" class=\" chosen-select form-control input \" data-content=\"يجب إدخال المورد\" required>\n"+
	                                "<option></option>\n"+
	                            "</select>\n"+
	                        "</span>\n"+
                    	"</div>\n"+
                    	"<div class=\"col-xs-1\" >الوحدة</div>\n"+
                    	"<div class=\"col-xs-2\" \n>"+
                        	"<input type=\"text\" name=\"item_code-"+counter+"\" class=\"base-select form-control input \" placeholder=\"اﻷصناف\" get=\"items-units\" to=\"based-units-"+counter+"\" data-content=\"يجب إدخال المورد\" required>\n"+
                    	"</div>\n"+
                    	"<div class=\"col-xs-1\" >كود الصنف</div>\n"+
                	"</div>\n";
        return row;
	}
	this.details = function(data){
		
		if (main.getModule() == "suppliers") {
			if (data.date == null) {
				data.date = " ----- ";
			}
			if (data.dept == null) {
				data.dept = " ----- ";
			}
			if (data.credit == null) {
				data.credit = " ----- ";
			}
			return "<tr><td>"+data.date+"</td><td>"+data.dept+"</td><td>"+data.credit+"</td></tr>";
		}
		if (main.getModule() == "purchasing-bills") {
			return "<tr><td>"+data.item+"</td><td>"+data.quantity+"</td><td>"+data.cost+"</td></tr>";
		}
	}
	this.base_select = function(module , method , data){
		params.calculate = {};
		params.calculate.units = data;
		tmpl = " <select  data-placeholder=\"الوحدة\" id=\"units\" name=\"units\" class=\" chosen-select form-control input\" data-content=\"يجب إدخال المورد\" required>";
		if (module == "items"){
			if (method == "units"){
				for (prop in data) {
					tmpl += "<option value=\""+data[prop].id+"\" > "+data[prop].name+" </option>\n";
				}
			}
		}
		return tmpl+"</select>";
	}
}
SERVER = function(){
	this.create = function(module , inputs , success_cb , fail_cb){
		$.post("/superdev/web/"+module+"/create",inputs.data, function(data) {
			success_cb(data);
		}).fail(function(){
			fail_cb();
		});
	}
	this.delete = function(module , id , success_cb , fail_cb ){
		$.post("/superdev/web/"+module+"/delete/"+id, {}, function(data) {
			success_cb(data)
		}).fail(function(err){
			fail_cb(err);
		});
	}
	this.getElement = function(id,module,success_cb,fail_cb){
		$.post("/superdev/web/"+module+"/view/"+id,{}, function(data) {
			success_cb(data);
		}).fail(function(err){
			fail_cb(err);
		});
	}
	this.update = function(id,module,inputs,success_cb,fail_cb){
		$.post("/superdev/web/"+module+"/update/"+id,inputs.data, function(data) {
			success_cb(data);
		}).fail(function(err){
			fail_cb(err);
		});
	}
	this.all = function(module,success_cb,fail_cb){
		$.post("/superdev/web/"+module+"/all", {} ,function(data) {
			success_cb(data);
		}).fail(function(err){
			fail_cb(err);
		});
	}
	this.details = function(module,id,success_cb,fail_cb){
		if (module == "suppliers") {
			module = "suppliers-accounts";
			inputs = {supplier_id:id};
		}
		if (module == "purchasing-bills") {
			module = "purchasing-bills-details";
			inputs = {purchasing_bills_id:id};
		}
		$.post("/superdev/web/"+module+"/details" ,inputs,function(data){
			success_cb(data);
		}).fail(function(err){
			fail_cb(err);
		});
	}
	this.get = function(module , method ,inputs , success_cb , fail_cb){
		$.post("/superdev/web/"+module+"/"+method,inputs, function(data) {
			success_cb(data);
		}).fail(function(err){
			fail_cb(err);
		});
	}
}
var main = new MAIN();
var DT = new DATATABLESJOBS();
var server = new SERVER();
var tpl = new TEMPLATES();
var params = {};