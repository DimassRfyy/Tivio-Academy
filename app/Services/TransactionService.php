<?php

namespace App\Services;

use App\Models\Pricing;
use App\Models\Transaction;
use App\Repositories\PricingRepositoryInterface;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TransactionService
{

  protected $pricingRepository;
  protected $transactionRepository;

  public function __construct(
    PricingRepositoryInterface $pricingRepository,
    TransactionRepositoryInterface $transactionRepository
  ) {
    $this->pricingRepository = $pricingRepository;
    $this->transactionRepository = $transactionRepository;
  }

  public function prepareCheckout(Pricing $pricing)
  {
    $user = Auth::user();
    $alreadySubscribed = $pricing->isSubscribedByUser($user->id);

    $tax = 0.11;
    $total_tax_amount = $pricing->price * $tax;
    $sub_total_amount = $pricing->price;
    $grand_total_amount = $sub_total_amount + $total_tax_amount;

    $started_at = now();
    $ended_at = $started_at->copy()->addMonths($pricing->duration);

    session()->put('pricing_id', $pricing->id);

    return compact (
      'total_tax_amount',
      'grand_total_amount',
      'sub_total_amount',
      'pricing',
      'user',
      'alreadySubscribed',
      'started_at',
      'ended_at'
    );
  }

  public function getRecentPricing()
  {
    $pricingId = session()->get('pricing_id');
    // return Pricing::find($pricingId);
    return $this->pricingRepository->findById($pricingId);
  }

  public function getUserTransactions()
  {
    $user = Auth::user();

    if (!$user) {
      return collect(); // Return an empty collection if the user not authenticated
    }

    return $this->transactionRepository->getUserTransactions($user->id);

    //n+1 query | Jika tidak menggunakan repositories, kita bisa melakukan code dibawah pada class service ini
    // return Transaction::with('pricing') // Assuming transaction has a pricing relationship
    //     ->where('user_id', $user->id)
    //     ->orderBy('created_at', 'desc')
    //     ->get();
  }
}
