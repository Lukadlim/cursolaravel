<!-- Modal Structure -->
<div id="delete-{{$product->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Are you sure?</h4>
        <div class="row">
            
            <p>Are you sure you want to delete {{$product->name}}? </p>

        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancel</a>

        <form action=" {{route('admin.product.delete', $product->id)}} " method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-green btn red right">Delete</button><br>
        </form>
    </div>
</div>