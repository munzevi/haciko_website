<div class="modal animated bounceIn" id="ajaxModel">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 style="margin:0;">Yeni Sayfa Ekleme</h4>
			</div>
			<!-- body -->
			<div class="modal-body" style="padding:0">
				<div class="row">
					<div class="col-md-12">
						<div class="card" style="box-shadow: none; ">
							<div class="card-body">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul id="tabs" class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#definitions" role="tab" aria-expanded="true" aria-selected="true">Tanımlamalar</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#content" role="tab" aria-expanded="false" aria-selected="false">İçerik</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#seo" role="tab" aria-expanded="false" aria-selected="false">SEO</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#ekstra" role="tab" aria-expanded="false" aria-selected="false">Ekstra</a>
											</li>
										</ul>
									</div>
								</div>
								<div id="my-tab-content" class="tab-content text-center" style="color:#66615b;">
									<div class="tab-pane active" id="definitions" role="tabpanel" aria-expanded="true">

										<form id="roleForm" name="roleForm" class="form-horizontal" novalidate>
											<div class="form-row mb-2">
												<input type="hidden" name="id" id="id" valu="">
												<div class="col-sm-6" style="padding-right: 0">
													<label for="title" class="col-sm-12 control-label">Adı *</label>
													<div class="col-sm-12">
														<input type="text" class="form-control" id="name" name="name" value="" maxlength="50" required>
													</div>
												</div>

												<div class="col-sm-6" style="padding-left: 0">
													<label for="slug" class="col-sm-12 control-label">Adresi</label>
													<div class="col-sm-12">
														<input type="text" class="form-control" id="slug" name="slug" value="" maxlength="50" required="">
													</div>
												</div>
											</div>
											<div class="form-row mb-2">
												<div class="col-sm-6" style="padding-right: 0">
													<label for="title" class="col-sm-12 control-label">Başlığı</label>
													<div class="col-sm-12">
														<input type="text" class="form-control" id="title" name="title" value="" maxlength="50" required="">
													</div>
												</div>

												<div class="col-sm-6" style="padding-left: 0">
													<label for="slug" class="col-sm-12 control-label">Alt Başlığı</label>
													<div class="col-sm-12">
														<input type="text" class="form-control" id="subtitle" name="subtitle" value="" maxlength="50" required="">
													</div>
												</div>
											</div>

											<div class="form-row mb-2">
												<div class="col-sm-4" style="padding-left: 0">
													<label for="language_id" class="col-sm-12 control-label">Dili</label>
													<div class="col-sm-12">
														<select class="form-control" name="language_id" id="language_id">
															<option value="1">İngilizce</option>
															<option value="2">Türkçe</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4" style="padding-left: 0">
													<label for="parent_id" class="col-sm-12 control-label">Üst Sayfası</label>
													<select class="form-control" name="parent_id" id="parent_id">
														<option value="1">Anasayfa</option>
														<option value="2">İletişim</option>
													</select>
												</div>
												<div class="col-sm-4" style="padding-left: 0">
													<label for="page_image" class="col-sm-12 control-label">
														Sayfa Görseli</label>
													<div class="col-sm-12">
														<input type="text" class="form-control" id="page_image" name="page_image" value="" maxlength="50" required="" placeholder="ekli olduğu sayfalarda göstermek için">
													</div>
												</div>
											</div>
											<div class="form-row my-3">
												<div class="col-md-12" style="display:flex;justify-content:flex-start;align-items:center;">
													<div class="custom-control custom-switch mx-3">
														<input type="checkbox" class="custom-control-input" id="show_at_parent" name="show_at_parent">
														<label class="custom-control-label" for="show_at_parent">
															Üst sayfada göster</label>
													</div>
													<div class="custom-control custom-switch mx-3">
														<input type="checkbox" class="custom-control-input" id="show_at_menu" name="show_at_menu">
														<label class="custom-control-label" for="show_at_menu">
															Menude Göster</label>
													</div>
													<div class="custom-control custom-switch  mx-3">
														<input type="checkbox" class="custom-control-input" id="status" name="status" class="active">
														<label class="custom-control-label" for="status">Akfif</label>
													</div>
												</div>
											</div>
									</div>
									<div class="tab-pane" id="content" role="tabpanel" aria-expanded="false">
										<div class="row">
											<div class="col-md-12">
												<label for="banner_or_slider" class="col-md-12 label-control">Banner Görseli</label>
												<button class="btn btn-sm btn-primary btn-block">Banner Görseli Ekle</button>
											</div>
											<div class="col-md-12">
												<label for="content" class="col-md-12 label-control">İçerik</label>
												<textarea id="content" name="content" class="form-control">
												</textarea>
											</div>
											<div class="col-md-12">
												<label for="feature_content" class="col-md-12 label-control">Özet İçerik</label>
												<textarea id="feature_content" name="feature_content" class="form-control">
												</textarea>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="seo" role="tabpanel" aria-expanded="false">
										<div class="row">
											<div class="col-md-6" style="padding-right:0;">
												<label for="title" class="col-sm-12 control-label">Sayfa Başlığı</label>
												<div class="col-sm-12">
													<input type="text" class="form-control" id="seo_title" name="seo_title" value="" maxlength="50" required="" style="margin-left:0">
												</div>
											</div>
											<div class="col-md-6" style="padding-left:0;">
												<label for="keywords" class="col-sm-12 control-label">Anahtar Kelimeler</label>
												<div class="col-sm-12">
													<input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="" maxlength="250" required="" style="margin-left:0";>
												</div>
											</div>
										</div>
                                        <div class="col-md-12">
                                            <label for="" class="col-md-12 label-control">Açıklama</label>
                                            <textarea name="seo_description" id="" cols="30" rows="10" class="form-control">
                                            </textarea>
                                        </div>
									</div>

									<div class="tab-pane" id="ekstra" role="tabpanel" aria-expanded="false">
										<span class="col-md-12 add-extra">
                                            <button class="btn btn-secondary btn-primary btn-sm mb-2 ml-1" id="add-button"><span><i class="nc-icon nc-simple-add" style="color:white;margin-right:5px;font-weight:600;"></i>Yeni Ayar Ekle</span></button>
										</span>
										<div id="extra-area">
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- body -->

				<!-- footer -->
				<div class="modal-footer text-center">
					<button class="btn btn-danger  modal-button" data-dismiss="modal">
						iptal
					</button>
					<button class="btn btn-primary modal-button">
						kaydet
					</button>
				</div>
				<!-- footer -->
			</div>
			<!-- content -->
		</div>
		<!-- dialog -->
	</div>
	<!-- modal -->
