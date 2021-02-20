<form class="inline-block" action="{{ $route }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="delete_item_in_form kt-badge kt-badge--outline kt-badge--danger"
        data-skin="dark" data-toggle="kt-tooltip" data-placement="top" title="حذف">
        <i class="la la-trash"></i>
    </button>
</form>