<a href="{{ route('page',['id' => $id]) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> مشاهده</a>
<a href="{{ route('admin.page.edit',['id' => $id]) }}" class="btn btn-sm btn-dark"><i class="fa fa-edit"></i> ویرایش</a>
<form method="post" action="{{ route('admin.page.delete',['id' => $id]) }}" style="display:inline;">
    @csrf
    @method('delete')
    <button onclick="return confirm('آیا از عملیات حذف اطمینان دارید؟')" class="btn btn-danger btn-sm btn-mobile"><i class="fa fa-trash"></i> حذف</button>
</form>