

					<!-- START:: FOOTER -->
					<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container kt-container--fluid justify-content-center">
							<div class="kt-footer__copyright" style="direction: ltr">
								Made With <i class="la la-heart kt-font-danger mx-2 mt-1"></i> 2021 
							</div>
						</div>
					</div>
					<!-- END:: FOOTER -->

				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- START::SCROLLTOP -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>
		<!-- END::SCROLLTOP -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
    <!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
    <!--end::Page Vendors -->

    <!-- START:: TEXT EDITOR SCRIPTS -->
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}" type="text/javascript"></script>
    <!-- END:: TEXT EDITOR SCRIPTS -->

		<!--START::SELECT2 SCRIPT -->
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
		<!--END::SELECT2 SCRIPT -->

		<!-- SRART:: BOOTSTRAP SELECT SCRIPT -->
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
		<!-- SRART:: BOOTSTRAP SELECT SCRIPT -->

		<!-- START:: HTML DATATABEL SCRIPT -->
		<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<!-- EDD:: HTML DATATABEL SCRIPT -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>
		<!--end::Page Scripts -->

		<!-- START:: SIMPLESELECT SCRIPT -->
		<script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
		<!-- END:: SIMPLESELECT SCRIPT -->

		<!-- START:: DATEPICKER SCRIPT -->
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
		<!-- START:: DATEPICKER SCRIPT -->

		<!-- START:: UPLOADFILES SCRIPT -->
		{{-- <script src="{{ asset('assets/plugins/custom/uppy/uppy.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/pages/crud/file-upload/uppy.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/pages/crud/file-upload/dropzonejs.js') }}" type="text/javascript"></script> --}}
		<!-- END:: UPLOADFILES SCRIPT -->

		<!-- START:: SWEET ALERT -->
		<script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js') }}" type="text/javascript"></script>
		<!-- END:: SWEET ALERT -->

		<!-- START:: SELECT TIME SCRIPT -->
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>
	<!-- END:: SELECT TIME SCRIPT -->

		<script src="{{ asset('assets/js/custom.js') }}"></script>

		@include('dashboard.layouts.includes.partials._session')


		<script>
			$('.delete_investigation').on('click',function(e){
				e.preventDefault();  
				if(!confirm("Do you really want to do this?")) {
					return false;
				}  
				var url = e.target;

				$.ajax({
					url: url.href,
					type: 'DELETE',
					data: {
						"_token": "{{ csrf_token()  }}",
					},
					success: function (){
						$(this).parent().parent().remove();
						console.log("it Works");
					}
				});
				$(this).parent().parent().remove(); 
			})

		</script>

		<script>
			function changeImagePreview(e, extType = 'image') {
				// alert(extType);
				var input = e.target.name;
				var files = e.target.files;
				var arrayExt = ['pdf','doc','docx','txt'];
				var div = $('input[name='+e.target.name+']').parent().next('div');
				// console.log(files);
				var src = (extType == 'file') ? 'http://www.pngall.com/wp-content/uploads/2018/05/Files-High-Quality-PNG.png':'https://lightwidget.com/wp-content/uploads/2018/05/local-file-not-found-295x300.png';
				$.each(files, function (key, file) {
					//start check file extension
					var allowExt = (extType == 'file' )?  arrayExt : ['jpg', 'jpeg', 'gif', 'png'];
					var ext = files[0].name.split('.');
					if (allowExt.includes(ext[1].toLowerCase()) == false) {
						toasts(attributes['Please Upload Valid '+extType+' Extension'], 'error', '', '', 2000);
						div.text('');
						files[0] = {};
						return false;
					}
					//end check extension
					var reader = new FileReader();
					reader.readAsDataURL(file);
					console.log(reader);
					reader.onload = function (e) {
						var image = '<div class="overlay-btn text-white" onclick="removeImagePreview(event)" data-div="'+input+'"><span class="bg-danger">&times;</span></div> <img class="img-thumbnail" width="200" height="200" src="' + e.target.result + '" onError="this.onerror=null;this.src= '+src+';">';
						div.html(image);
					}
				});
			}

			/**
			 * Remove image preview
			 * @param event
			 */
			function removeImagePreview(event){
				var target = $('input[name='+$(event.target).data('div')+']');
				var div = target.parent().next('div');
				div.text('');//remove data preview
				target.val('');//empty file input
				var route = target.data('delete');
				console.log(route);
			}
		</script>
		@stack('scripts')
	</body>

	<!-- end::Body -->
</html>