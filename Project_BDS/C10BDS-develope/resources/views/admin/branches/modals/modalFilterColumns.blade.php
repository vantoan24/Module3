<!-- #modalFilterColumns -->
<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel" aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content">
            <!-- .modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalFilterColumnsLabel"> Lọc nâng cao </h5>
            </div><!-- /.modal-header -->
            <!-- .modal-body -->
            <div class="modal-body">
                <!-- #filter-columns -->
                <div id="filter-columns">
                    <!-- .form-row -->
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tên nhánh</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[name]" class="form-control filter-column f-name" value="{{ (isset($filter['name']) ? $filter['name'] : '') }}" id="name" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Số điện thoại</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[phone]" class="form-control filter-column f-name" value=" {{ (isset($filter['phone']) ? $filter['phone'] : '') }} " id="phone" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tỉnh/ Thành phố</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="filter[province_id]" class="form-control province_id">
                                <option value="">Vui lòng chọn</option>
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}" @selected(isset($filter['province_id']) ? ($province->id == $filter['province_id']) : false)>
                                    {{$province->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Quận/ Huyện</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="filter[district_id]" class="form-control district_id">
                                <option value="">Vui lòng chọn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Xã/ Phường</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="filter[ward_id]" class="form-control ward_id">
                                <option value="">Vui lòng chọn</option>
                            </select>
                        </div>
                    </div>
                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('branches.index') }}" class="btn btn-dark ">Đặt lại</a>
                <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto" id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->
<script>
    jQuery(document).ready(function() {
        jQuery('.province_id').on('change', function() {
            var province_id = jQuery(this).val();

            $.ajax({
                url: "/api/get_districts/" + province_id,
                type: "GET",
                success: function(data) {
                    var districts_html = '<option value="">Vui lòng chọn</option>';
                    for (const district of data) {
                        districts_html += '<option value="' + district.id + '">' + district.name + '</option>';
                    }
                    jQuery('.district_id').html(districts_html);
                }
            });
        });

        jQuery('.district_id').on('change', function() {
            var district_id = jQuery(this).val();
            $.ajax({
                url: "/api/get_wards/" + district_id,
                type: "GET",
                success: function(data) {
                    var wards_html = '<option value="">Vui lòng chọn</option>';
                    for (const ward of data) {
                        wards_html += '<option value="' + ward.id + '">' + ward.name + '</option>';
                    }
                    jQuery('.ward_id').html(wards_html);
                }
            });
        });
    });
</script>