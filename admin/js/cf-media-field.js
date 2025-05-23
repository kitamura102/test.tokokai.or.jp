jQuery(document).ready(function($) {

	var media_frame;
	var cfmf_current;
	var cfmf_target_id;
	var cfmf_text_title = 'Select image';
	var cfmf_text_select = 'Use this image';
	var cfmf_video_text_title = 'Select MP4 file';
	var cfmf_video_text_select = 'Use this MP4 file';

	if (typeof cfmf_text == 'object') {
		if (typeof cfmf_text.image_title == 'string') {
			cfmf_text_title = cfmf_text.image_title;
		} else if (typeof cfmf_text.title == 'string') {
			cfmf_text_title = cfmf_text.title;
		}
		if (typeof cfmf_text.image_button == 'string') {
			cfmf_text_select = cfmf_text.image_button;
		} else if (typeof cfmf_text.button == 'string') {
			cfmf_text_select = cfmf_text.button;
		}

		if (typeof cfmf_text.video_title == 'string') {
			cfmf_video_text_title = cfmf_text.video_title;
		}
		if (typeof cfmf_text.video_button == 'string') {
			cfmf_video_text_select = cfmf_text.video_button;
		}
	}

	if (typeof cfmf_video_text == 'object') {
		if (typeof cfmf_video_text.title == 'string') {
			cfmf_video_text_title = cfmf_video_text.title;
		}
		if (typeof cfmf_video_text.button == 'string') {
			cfmf_video_text_select = cfmf_video_text.button;
		}
	}

	// click event
	$(document).on('click', '.cf_media_field .cfmf-select-img', function(e){
		e.preventDefault();
		if (typeof media_frame != 'undefined') {
			media_frame.close();
		}

		// create and open new file frame
		media_frame = wp.media({
			title: cfmf_text_title,
			library: {
				type: 'image'
			},
			button: {
				text: cfmf_text_select
			},
			multiple: false,
		});

		media_frame.on('open',function(){
			var selection = media_frame.state().get('selection');
			var selected_media_id = cfmf_current.find('.cf_media_id').val();
			if (selected_media_id) {
				selection.add(wp.media.attachment(selected_media_id));
			}
		});

		// callback for selected image
		media_frame.on('select', function(){
			var selection = media_frame.state().get('selection').first();
			$('#'+cfmf_target_id).val(selection.attributes.id).trigger('change');
			cfmf_current.find('.preview_field').html('<img src="'+selection.attributes.url+'" />');

			// リアルタイムプレビュー用
			cfmf_current.closest('.preview_image_wrapper').find('.preview_image').attr('src',selection.attributes.url);

			cfmf_current.find('.cfmf-delete-img').show();
			cfmf_current = null;
			cfmf_target_id = null;
		});

		// form element
		cfmf_current = $(this).closest('.cf_media_field');
		cfmf_target_id = cfmf_current.find('.cf_media_id').attr('id');

		// open
		media_frame.open();
	});

	// delete image
	$(document).on('click', '.cf_media_field .cfmf-delete-img', function(e) {
		var c = $(this).closest('.cf_media_field');
		c.find('.cf_media_id').val('').trigger('change');
		c.find('.preview_field').html('');

		// リアルタイムプレビュー用
		var preview_image = $(this).closest('.preview_image_wrapper').find('.preview_image');
		preview_image.attr('src', preview_image.data('src'));

		$(this).hide();
	});




	// click event for mp4 file --------------------------------------------------------------
	$(document).on('click', '.cf_media_field .cfmf-select-video', function(e){
		e.preventDefault();
		if (typeof media_frame != 'undefined') {
			media_frame.close();
		}

		// create and open new file frame
		media_frame = wp.media({
			title: cfmf_video_text_title,
			library: {
				type: 'video'
			},
			button: {
				text: cfmf_video_text_select
			},
			multiple: false,
		});

		media_frame.on('open',function(){
			var selection = media_frame.state().get('selection');
			var selected_media_id = cfmf_current.find('.cf_media_id').val();
			if (selected_media_id) {
				selection.add(wp.media.attachment(selected_media_id));
			}
		});

		// callback for selected image
		media_frame.on('select', function(){
			var selection = media_frame.state().get('selection').first();
			$('#'+cfmf_target_id).val(selection.attributes.id).trigger('change');
			cfmf_current.find('.preview_field').html('<p class="uploaded_video_file">'+selection.attributes.url+'</p>');
			cfmf_current.find('.cfmf-delete-video').show();
			cfmf_current = null;
			cfmf_target_id = null;
		});

		// form element
		cfmf_current = $(this).closest('.cf_media_field');
		cfmf_target_id = cfmf_current.find('.cf_media_id').attr('id');

		// open
		media_frame.open();
	});

	// delete image
	$(document).on('click', '.cf_media_field .cfmf-delete-video', function(e) {
		var c = $(this).closest('.cf_media_field');
		c.find('.cf_media_id').val('').trigger('change');
		c.find('.preview_field').html('');
		$(this).hide();
	});

});