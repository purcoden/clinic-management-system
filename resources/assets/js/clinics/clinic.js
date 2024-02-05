listenClick('.clinic-delete-btn', function (event) {
    let clinicRecordId = $(event.currentTarget).attr('data-id')
    deleteItem(route('clinics.destroy', clinicRecordId), Lang.get('messages.clinic.clinic'))
})

listenChange('.clinic-email-verified', function (e) {
    let verifyRecordId = $(e.currentTarget).attr('data-id')
    let value = $(this).is(':checked') ? 1 : 0
    $.ajax({
        type: 'POST',
        url: route('emailVerified'),
        data: {
            id: verifyRecordId,
            value: value,
        },
        success: function (result) {
            livewire.emit('refresh')
            displaySuccessMessage(result.message)
        },
    })
})

listenClick('.clinic-email-verification', function (event) {
    let clinicVerifyId = $(event.currentTarget).attr('data-id')
    $.ajax({
        type: 'POST',
        url: route('resend.email.verification', clinicVerifyId),
        success: function (result) {
            livewire.emit('refresh')
            displaySuccessMessage(result.message)
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})
