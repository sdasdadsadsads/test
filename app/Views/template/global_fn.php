<script>
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>';

    var GROUP_ADMIN_LENGTH = 0;
    const validateEmergency = async () => {
        try {
            setInterval(function() {
                $.ajax({
                    dataType: "json",
                    url: '<?php echo base_url('/emergency') ?>',
                    success: function(response) {
                        if (response.status === true) {
                            var x = document.getElementsByTagName("html")[0].innerHTML = `
                            <head></head>
                            <body>
                                <div align="center">
                                    <img src="<?php echo base_url('/mdes.jpg') ?>" width="800" height="700">
                                </div>
                            </body>
                            `
                        }
                    }
                });
            }, 5000);
        } catch (err) {
            console.log(err);
        }
    }

    const callEmergency = async () => {
        let listOffice = [];
        for (let i = 1; i <= GROUP_ADMIN_LENGTH; i++) {
            let group = document.getElementById('office-' + i);
            if (group.checked === true) listOffice.push(group.value)
        }

        if (listOffice.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'โปรดเลือก office ที่คุณต้องการ',
                showConfirmButton: true,
                timer: 2500
            })
            return;
        }

        $.ajax({
            dataType: "json",
            type: 'POST',
            url: '<?php echo base_url('/callEmergency') ?>',
            data: {
                [csrfName]: csrfHash,
                office: JSON.stringify(listOffice),
            },
            success: function(response) {
                if (response.status === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'ระบบจะทำการปิดภายใน 1 นาที',
                        showConfirmButton: true,
                        timer: 2500
                    })
                    $("#exampleModal").modal("hide")

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        showConfirmButton: true,
                        timer: 2500
                    })
                    return;
                }
            },
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    showConfirmButton: true,
                    timer: 2500
                })
                return;
            }

        });
    }

    const getModalEmergencyLock = async () => {
        $.ajax({
            dataType: "json",
            type: 'GET',
            data: {
                ['<?= csrf_token() ?>']: '<?= csrf_hash() ?>'
            },
            url: '<?php echo base_url('/admin/getGroup') ?>',
            success: function(response) {
                let dom = document.getElementById('groub_admin')
                dom.innerHTML = "";
                GROUP_ADMIN_LENGTH = response.data.length;
                response.data.forEach(element => {
                    dom.innerHTML += `
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" id="office-${element.id}" value="${element.id}">
                        <label class="form-check-label" for="office-${element.id}">
                            ${element.office_name}
                        </label>
                    </div>`
                });
                $('#EmegencyModal').modal('show');
            }
        })
    }


    validateEmergency();
</script>