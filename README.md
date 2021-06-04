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

You can pass arguments and TinyMCE options directly from a field to customize your toolbar and plugins, like this:

```php
NovaTinymce5Editor::make('Body')->placeholder('Enter content here')
->options(['toolbar' => ['undo redo | align | link | code'], 'plugins' => ['link code']]),
```
For available options/plugins visit official TinyMCE 5 documentation.

## Integration with Media Library

Nova TinyMCE 5 Editor field works well with [Nova Media Library](https://github.com/classic-o/nova-media-library). If you would like to insert images from Media Library directly to editor content, you need to install Nova Media Library field first and add a Media Library JS callback field. To make it work, you need to add custom *id for TinyMCE field `->id('body')`, and meta argument `->withMeta(['mediaLibrary' => true])` and then pass the same editor *id to your Media Library callback field. In the example below we use 'body' for *id because that is the column name in our database:


```php
NovaTinymce5Editor::make('Body')->id('body')->withMeta(['mediaLibrary' => true]),

MediaLibrary::make('Insert image', 'js_callback_media_library')
->jsCallback('mediaLibrarySelectFiles', ['editor' => 'body'])->types(['Image']),
```

### Screenshots

TinyMCE editor without inserted image
![Nova TinyMCE 5 Editor](https://novapackages.com//storage/screenshots/kGTLSsRXw9yA57nkAFg2a3ntLh3clSrDKRGGSaY0.png)

TinyMCE editor with inserted image
![Nova TinyMCE 5 Editor](https://novapackages.com//storage/screenshots/1aMkYKPgnLIRjObTV03mo2BBwa5KO3bcgwyEkRPs.png)

Image file options
![Nova TinyMCE 5 Editor](https://novapackages.com//storage/screenshots/XAVVvuLaAXfpNRul35ngTbGn4haLp6yDMHV0j5Yg.jpg)


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[MIT](https://choosealicense.com/licenses/mit/)
