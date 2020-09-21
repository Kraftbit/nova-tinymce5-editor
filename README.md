# Laravel Nova TinyMCE 5 Editor field

Nova TinyMCE 5 Editor is Laravel Nova field that integrates TinyMCE5 WYSIWYG editor.

## Installation

Use the [composer](https://getcomposer.org/) to install this package.

```bash
composer require kraftbit/nova-tinymce5-editor
```

## Usage

Publish config with the following command:

```bash
php artisan vendor:publish --provider="Kraftbit\NovaTinymce5Editor\FieldServiceProvider"
```

Now you have nova-tinymce5-editor.php file in your config folder. Edit TinyMCE options and toolbar here.

Add your TinyMCE cloud API key here or to your .env file like this:

```bash
TINYMCE_API_KEY=your-key-here
```
After that you are good to go! Add NovaTinymce5Editor class and field to your Nova Resource.

```php
use Kraftbit\NovaTinymce5Editor\NovaTinymce5Editor;

...

NovaTinymce5Editor::make('Body', 'body'),
```

## Available options

You can pass arguments and TinyMCE options directly from a field (but you need to include appropriate TinyMCE plugins to config). Here's example of available options:

```php
NovaTinymce5Editor::make('Body')->id('body')->placeholder('Enter content here')->options(['toolbar' => [ 'undo redo | align | link table media | code']]),
```
## Integration with Media Library

Nova TinyMCE 5 Editor field works well with [Nova Media Library](https://github.com/classic-o/nova-media-library). If you would like to insert images inline to editor content, you need to install Nova Media Library field first and add a callback field. Add "'mediaLibrary' => true" meta argument to Nova TinyMCE5 Editor field. Here's example:


```php
NovaTinymce5Editor::make('Body')->withMeta(['mediaLibrary' => true]),

MediaLibrary::make('Insert image', 'js_callback_media_library_body')
->jsCallback('mediaLibrarySelectFiles', ['editor' => 'body'])->types(['Image']),
```

### Screenshots

![Nova TinyMCE 5 Editor](https://raw.githubusercontent.com/kraftbit/nova-tinymce5-editor/master/docs/screenshot_1.png)

![Nova TinyMCE 5 Editor](https://raw.githubusercontent.com/kraftbit/nova-tinymce5-editor/master/docs/screenshot_2.png)


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[MIT](https://choosealicense.com/licenses/mit/)
