@include( 'partials.forms.paypal.paypal-form-header' )
<input type="hidden" name="custom" value="{{ Auth::user()->id }}"/>
<input type="hidden" name="item_name_1" value="SkiTime Lifetime Membership"/>
<input type="hidden" name="amount_1" value="1.99"/>
  <div class="form-group">
    <input type="submit" class="btn btn-success form-control" value="Pay The Moneys" />
  </div>
</form>

@include( 'partials.forms.paypal.paypal-form-footer' )