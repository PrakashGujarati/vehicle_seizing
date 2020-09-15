@foreach ($subscriptions as $subscription)
<tr>
  <td>{{ isset($subscription->Username->name) ? $subscription->Username->name:'' }}</td>
  <td>{{ isset($subscription->days) ? $subscription->days:'' }}</td>
  <td>{{ isset($subscription->amount) ? $subscription->amount:'' }}</td>
  <td>{{ isset($subscription->payment_status) ? $subscription->payment_status:'' }}</td>
  <td>{{ isset($subscription->payment_mode) ? $subscription->payment_mode:'' }}</td>
  <td>{{ isset($subscription->notes) ? $subscription->notes:'' }}</td>
  {{-- <td>
      <a title="Edit" href="{{route('subscription.edit',$subscription->id)}}">
        <i class="fas fa-edit"></i>
      </a>
  </td> --}}

</tr>
@endforeach