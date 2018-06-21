<div class="col-lg-12" style="margin-bottom: 20px;">
    <form class="form-inline" method="get" action="{{ url("/admin/product/".$url."/search") }}">
        <input type="hidden" name="status" value="{{ $status }}">
        <div class="form-group  col-lg-6">
            <div class="input-group"  style="width: 100%;">
                <input type="text" name="s" value="{{ Request::get('s') }}"
                       class="form-control" placeholder="Search">
                <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i> Search</button>
                       </span>
            </div>
        </div>

        <div class="form-group  col-lg-6 text-right">
            <div class="form-group">
                <label for="per_page">Per Page</label>
                <select class="form-control" name="per_page" id="per_page">
                    <option value="10" {{ Request::get('per_page') == 10 ? 'SELECTED' : '' }}>10</option>
                    <option value="20" {{ Request::get('per_page') == 20 ? 'SELECTED' : '' }}>20</option>
                    <option value="50" {{ Request::get('per_page') == 50 ? 'SELECTED' : '' }}>50</option>
                    <option value="100" {{ Request::get('per_page') == 100 ? 'SELECTED' : '' }}>100</option>
                </select>
            </div>
        </div>

    </form>
</div>