$(document).ready(function () {

  // 首页笑脸
  $('.unhappy').mouseover(function () {
    $(this).addClass('active');
  }).mouseout(function () {
    $(this).removeClass('active');
  });
  $('.happy').mouseover(function () {
    $(this).addClass('active');
  }).mouseout(function () {
    $(this).removeClass('active');
  });
  // 首页笑脸点击跳转页面
  $('.unhappy').click(function () {
    $(".HH").addClass("H2");
    want("show2");
  });
  $('.runhappy1').click(function () {
    want("show1");
    $(".HH").removeClass("H2");
  });
  $(".unhappy1").click(function () {
    var unchoose = false;
    $("input[name=unchoose1]").each(function () {
      if ($(this).prop("checked") == true) {
        unchoose = true;

        $("#unchoose1").val($(this).val());
      }
    });
    if (!unchoose) {
      alert("Choose one of the following to proceed further");
      return false;
    }
    if($('#put').hasClass('active')){
    	if($('#unchoose_text').val()==''){
        	alert('Please fill in the question');
          	return false;
        }
    }
    
    // var unchoose_text=$("#unchoose_text").val();
    // if(!unchoose_text){
    //   alert("Please tell us what's goes wrong");
    //   return false;
    // }
    $(".HH").addClass("H3");
    want("show21");
  });


  // 切换
  var labs = document.querySelectorAll('.rs');
  var as = document.querySelectorAll('.a');
  var indexId = '';
  for (var i = 0; i < labs.length; i++) {
    labs[i].setAttribute('index', i);
    labs[i].onclick = function () {



      indexId = this.getAttribute('index');

      console.log(indexId);


      for (var i = 0; i < as.length; i++) {
        $(as[i]).hide();
      }
      $(as).eq(indexId).show();
      $(as).eq(indexId).addClass('cardForm').siblings().removeClass('cardForm');
      // as[index].style.display = 'block';
    }
  }





  $('.runhappy2').click(function () {
    $(".HH").removeClass("H3");
    want("show2");
  });
  $('.unhappy2').click(function () {
    var unchoose = false;
    $("input[name=unchoose2]").each(function () {
      if ($(this).prop("checked") == true) {
        unchoose = true;
        $("#unchoose2").val($(this).val());
      }
    });
    if (!unchoose) {
      alert("Please choose");
      return false;
    };
    
    
    
    if($('form.active input.name').val()==''){
    	alert('please enter your name');
      	return false;
    }
    if($('form.active input.email').val()==''){
    	alert('please enter your email');
      	return false;
    }
     if($('#inputAddress01').parents('form').hasClass('active')&&$("#inputAddress01").val()==''){
    	alert('Please fill in the address');
      	return false;
    }
    if($('#texr').parents('form').hasClass('active')&&$("#texr").val()==''){
    	alert('Please fill in the question');
      	return false;
    }
    if($('form.active input[type="checkbox"]').is(":checked")){
    	var inputorderID01 = '';
    }else{
    	 if($('form.active input.order').val()==''){
            alert('please enter your order');
            return false;
        }else{
        	var inputorderID01 =$('form.active input.order').val();
        }
    }
    //var inputorderID01 = $("#inputorderID01").val() + $("#inputorderID02").val() + $("#inputorderID03").val() + $("#inputorderID04").val();
   // var inputName01 = $("#inputName01").val() + $("#inputName02").val() + $("#inputName03").val() + $("#inputName04").val();
    //var inputEmail01 = $("#inputEmail01").val() + $("#inputEmail02").val() + $("#inputEmail03").val() + $("#inputEmail04").val();
    // var inputorderID02 = $("#inputorderID02").val();
    //var inputAddress01 = $("#inputAddress01").val();
    var unchoose1 = $("#unchoose1").val();
    var unchoose2 = $("#unchoose2").val();
    //var inputorderID01 =$("#inputorderID01").val() + $("#inputorderID02").val() + $("#inputorderID03").val() + $("#inputorderID04").val();
    var unchoose_text = $("#unchoose_text").val();
    var inputName01 = $('form.active input.name').val();
    var inputEmail01 = $('form.active input.email').val();
    var inputAddress01 = $("#inputAddress01").val();
    var texr = $("#texr").val();
    $.ajax({
      url: "index.php?m=Index&a=unhappy_add",
      type: "POST",
      /*dataType: "json",*/
      data: {
        "choose1": unchoose1,
        "choose2": unchoose2,
        "choose_txt1": unchoose_text,
        "choose_ID": inputorderID01,
        "choose_name": inputName01,
        "choose_em": inputEmail01,
        "choose_address": inputAddress01,
        "choose1_nr": texr,
      },
      success: function (data) {
        window.location.href = "index.php?m=Index&a=unsure";
      }
    });
  });
  $('.happy').click(function () {
    $(".HH").addClass("H2");
    want("show3");
  });
  $(".rhappy1").click(function () {
    $(".HH").removeClass("H2");
    want("show1");
  });
  $('.happy1').click(function () {
    $(".HH").addClass("H3");
    want("show31");
  });
  $(".rhappy2").click(function () {
    $(".HH").removeClass("H3");
    want("show3");
  });
  $(".happy2").click(function () {
    var unchoose = false;
    var lihe;
    $("input[name=lihe]").each(function () {
      if ($(this).prop("checked") == true) {
        unchoose = true;
        lihe = $(this).val();
      }
    });
    if (!unchoose) {
      $('.tshi').show();
      return false;
    }
    if (indexId == 0) {
      var file = $("#file").val();
      if (!file) {
        $('.tshi').show();
        return false;
      }
     
      var input_id = $("#input_id").val();
      if (!input_id) {
        $('.tshi').show();
        return false;
      }
      var email = $("#email").val();

      if (!email) {
        $('.tshi').show();
        return false;
      }

      var name = $("#name").val();
      if (!name) {
        $('.tshi').show();
        return false;
      }
      var shippingAddress = $("#shippingAddress").val();
      if (!shippingAddress) {
        alert("请输入购物地址");
        return false;
      }
    }else {

      var file2 = $("#file2").val();
      if (!file2) {
        $('.tshi').show();
        return false;
      }
       var id2 = $(".id2").val();
      if (!id2) {
        $('.tshi').show();
        return false;
      }
      var email2 = $(".email2").val();
      if (!email2) {
        $('.tshi').show();
        return false;
      }
      var name2 = $(".name2").val();
      if (!name2) {
        $('.tshi').show();
        return false;
      }
    }




    var formData = new FormData();
    formData.append('lihe', lihe);
    /*
    formData.append('input_id', $("#input_id").val() + $(".id2").val());
    formData.append('email', $("#email").val() + $(".email2").val());
    formData.append('name', $("#name").val() + $(".name2").val());
    formData.append('shippingAddress', $("#shippingAddress").val());
    formData.append('pic', document.getElementById('file2').files[0]+document.getElementById('file').files[0]);
    */
    formData.append('input_id', $("#input_id").val() + $(".id2").val());
    formData.append('email', $("#email").val() + $(".email2").val());
    formData.append('name', $("#name").val() + $(".name2").val());
    formData.append('shippingAddress', $("#shippingAddress").val());
    var file = $(".cardForm input[type=file]").get(0).files[0];
    formData.append('pic', file);
    console.log(formData);
    
    $.ajax({
      url: "index.php?m=Index&a=happy_add",
      type: "POST",
      data:formData,
      processData: false, // 告诉jQuery不要去处理发送的数据
      contentType: false, // 告诉jQuery不要去设置Content-Type请求头
      datatype: formData,
      success: function (data) {
        //console.log(data);
        window.location.href = "index.php?m=Index&a=sure";
      }
    });
    // 
  });
  // unhappy页面
  // $('.form-check').click(function () {
  //   $(this).addClass('active').siblings().removeClass('active');
  //   $('.form-check').children('input').removeAttr('checked');
  //   $(this).children('input').attr('checked', 'checked');
  //   $('.liuy').hide();
  // });
  $('#put').click(function () {
    $('.liuy').show();
    $('.liuy').children().val('');
  });

  function want(name) {
    $(".show").addClass("hide");
    $("." + name).removeClass("hide");
  }


});