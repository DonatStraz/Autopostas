import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $(document).ready(function () {
        $('#make-select').on('change', function () {
            var make_id = this.value;
            $.ajax({
            url: 'api/fetch-models',
            type: "POST",
            data: {
                make_id: make_id,
            },
            dataType: 'json',
            success: function (result) {
                $('#model-select').html('<option value="">Modelis</option>');
                $.each(result.models, function (key, value) {
                    $("#model-select").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $('#generation-select').html('<option value="">Metai</option>');
            }
            });
        });

        $('#model-select').on('change', function () {
            var model_id = this.value;
                $("#generation_select").html('');
                $.ajax({
                url: 'api/fetch-generations',
                type: "POST",
                data: {
                    model_id: model_id,
                },
                dataType: 'json',
                success: function (res) {
                    $('#generation-select').html('<option value="">Metai</option>');
                    $.each(res.generations, function (key, value) {
                        $("#generation-select").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
});

/* Number buttons */
const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
  );

const incrementButtons = document.querySelectorAll(
`button[data-action="increment"]`
);

function decrement(e) {
    e.preventDefault();
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value -= 0.5;
    target.value = (Math.round(value * 100) / 100).toFixed(1);
    if(value === 0){
        btn.disabled = true;
    }
  }
  function increment(e) {
    e.preventDefault();
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value += 0.5;
    target.value = (Math.round(value * 100) / 100).toFixed(1);

    if(value >= 0){
        btn.disabled = false;
    }
  }

  decrementButtons.forEach(btn => {
    btn.addEventListener("click", decrement);
  });

  incrementButtons.forEach(btn => {
    btn.addEventListener("click", increment);
  });

  /*Edit User data*/


  let userNameInput = document.getElementById("userName");
  let userEmailInput = document.getElementById("userEmail");
  let submitBtn = document.getElementById("acceptChanges")

  document.getElementById('editUserBtn').onclick = function() {
    var disabled = document.getElementById("userName").disabled;
    if (disabled) {
        userNameInput.disabled = false;
        userEmailInput.disabled = false;
        userNameInput.classList.add("dashboard-input");
        userEmailInput.classList.add("dashboard-input");
        submitBtn.style.visibility = "visible";
    }
    else {
        userNameInput.disabled = true;
        userEmailInput.disabled = true;
        submitBtn.style.visibility = "hidden";
        userNameInput.classList.remove("dashboard-input");
        userEmailInput.classList.remove("dashboard-input");
    }
}
