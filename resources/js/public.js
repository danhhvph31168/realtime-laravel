import './bootstrap';

window.Echo.channel('vouchers')
    .listen('VoucherCreated', (event) => {
        console.log(event);
        alert(`Voucher mới: ${event.title} - ${event.discount}% giảm giá!`);
    });
