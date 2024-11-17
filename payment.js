fetch('php/payment.php', {
    method: 'POST',
})
.then((res) => res.json())
.then((data) => {
    const stripe = Stripe('your_publishable_key');
    stripe.redirectToCheckout({ sessionId: data.id });
});
