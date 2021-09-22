<!doctype html>
<html lang="{{ app()->getLocale() }}" class="dark">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,700;1,400&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism-okaidia.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/toolbar/prism-toolbar.min.css" integrity="sha512-ycl7dIZ0VJ5535/dzskAMTwOI6OoTNZ3PeD+tfckvYqMmAzaEwQfJHqJTSqcV2iQeJnp5XxnFy5jKotibstp7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    @yield('head')
</head>
<body
    class="flex flex-col justify-between min-h-screen bg-white dark:bg-siyah-900 dark:text-beyaz-300 text-gray-800 leading-normal">
<header class="flex items-center  bg-white dark:bg-siyah-800 h-12 py-4" role="banner">
    <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
        <div class="flex items-center">
            <a href="/" title="Blog Starter Template home" class="inline-flex items-center">

                <h1 class="text-lg md:text-2xl text-gray-300 font-semibold hover:text-gray-200 my-0">xuma.dev //</h1>
            </a>
        </div>

        <div id="vue-search" class="flex flex-1 justify-end items-center">

            <nav class="hidden lg:flex items-center justify-end text-lg">
                <a
                    href="/blog"
                    class="ml-6 text-gray-700 dark:text-beyaz-300 dark:hover:text-mavi-500 hover:text-blue-600 ">
                    Blog
                </a> <a title="Blog Starter Template About" href="/about"
                        class="ml-6 text-gray-700 hover:text-blue-600 dark:text-beyaz-300 dark:hover:text-mavi-500">
                    About
                </a> <a title="Blog Starter Template Contact" href="/contact"
                        class="ml-6 text-gray-700 hover:text-blue-600 dark:text-beyaz-300 dark:hover:text-mavi-500">
                    Contact
                </a></nav>
            <button onclick="navMenu.toggle()"
                    class="flex justify-center items-center bg-blue-500 border border-blue-500 h-10 px-5 rounded-full lg:hidden focus:outline-none">
                <svg id="js-nav-menu-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                     class="fill-current text-white h-9 w-4">
                    <path
                        d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"></path>
                </svg>
                <svg id="js-nav-menu-hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 30"
                     class="hidden fill-current text-white h-9 w-4">
                    <polygon
                        points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "></polygon>
                </svg>
            </button>
        </div>
    </div>
</header>
<main role="main" class="flex-auto w-full container max-w-7xl mx-auto pt-8 pb-16 px-6">
        {{ $slot }}
</main>
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/toolbar/prism-toolbar.min.js" integrity="sha512-YrvgEHAi5/3o2OT+/vh1z19oJXk/Kk0qdVKbjEFl9VRmcLTaWRYzVziZCvoGpJ2TrnV7rB8pnJcz1ioVJjgw2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/show-language/prism-show-language.min.js" integrity="sha512-teI3HjGzxHZz40l8V9ViL7ga18moIgswEgojE/Zl8jhAPhwkZI5/Y+RcIi8yMfA0TW0XHnfOpcmdm9+xj8atow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    (function () {

        if (typeof Prism === 'undefined' || typeof document === 'undefined') {
            return;
        }

        if (!Prism.plugins.toolbar) {
            console.warn('Show Languages plugin loaded before Toolbar plugin.');

            return;
        }

        /* eslint-disable */

        // The languages map is built automatically with gulp
        var Languages = /*languages_placeholder[*/{
            "none": "Plain text",
            "plain": "Plain text",
            "plaintext": "Plain text",
            "text": "Plain text",
            "txt": "Plain text",
            "html": "HTML",
            "xml": "XML",
            "svg": "SVG",
            "mathml": "MathML",
            "ssml": "SSML",
            "rss": "RSS",
            "css": "CSS",
            "clike": "C-like",
            "js": "JavaScript",
            "abap": "ABAP",
            "abnf": "ABNF",
            "al": "AL",
            "antlr4": "ANTLR4",
            "g4": "ANTLR4",
            "apacheconf": "Apache Configuration",
            "apl": "APL",
            "aql": "AQL",
            "arff": "ARFF",
            "asciidoc": "AsciiDoc",
            "adoc": "AsciiDoc",
            "aspnet": "ASP.NET (C#)",
            "asm6502": "6502 Assembly",
            "autohotkey": "AutoHotkey",
            "autoit": "AutoIt",
            "avisynth": "AviSynth",
            "avs": "AviSynth",
            "avro-idl": "Avro IDL",
            "avdl": "Avro IDL",
            "basic": "BASIC",
            "bbcode": "BBcode",
            "bnf": "BNF",
            "rbnf": "RBNF",
            "bsl": "BSL (1C:Enterprise)",
            "oscript": "OneScript",
            "csharp": "C#",
            "cs": "C#",
            "dotnet": "C#",
            "cpp": "C++",
            "cfscript": "CFScript",
            "cfc": "CFScript",
            "cil": "CIL",
            "cmake": "CMake",
            "cobol": "COBOL",
            "coffee": "CoffeeScript",
            "conc": "Concurnas",
            "csp": "Content-Security-Policy",
            "css-extras": "CSS Extras",
            "csv": "CSV",
            "dataweave": "DataWeave",
            "dax": "DAX",
            "django": "Django/Jinja2",
            "jinja2": "Django/Jinja2",
            "dns-zone-file": "DNS zone file",
            "dns-zone": "DNS zone file",
            "dockerfile": "Docker",
            "dot": "DOT (Graphviz)",
            "gv": "DOT (Graphviz)",
            "ebnf": "EBNF",
            "editorconfig": "EditorConfig",
            "ejs": "EJS",
            "etlua": "Embedded Lua templating",
            "erb": "ERB",
            "excel-formula": "Excel Formula",
            "xlsx": "Excel Formula",
            "xls": "Excel Formula",
            "fsharp": "F#",
            "firestore-security-rules": "Firestore security rules",
            "ftl": "FreeMarker Template Language",
            "gml": "GameMaker Language",
            "gamemakerlanguage": "GameMaker Language",
            "gap": "GAP (CAS)",
            "gcode": "G-code",
            "gdscript": "GDScript",
            "gedcom": "GEDCOM",
            "glsl": "GLSL",
            "gn": "GN",
            "gni": "GN",
            "graphql": "GraphQL",
            "hbs": "Handlebars",
            "hs": "Haskell",
            "hcl": "HCL",
            "hlsl": "HLSL",
            "http": "HTTP",
            "hpkp": "HTTP Public-Key-Pins",
            "hsts": "HTTP Strict-Transport-Security",
            "ichigojam": "IchigoJam",
            "icu-message-format": "ICU Message Format",
            "idr": "Idris",
            "ignore": ".ignore",
            "gitignore": ".gitignore",
            "hgignore": ".hgignore",
            "npmignore": ".npmignore",
            "inform7": "Inform 7",
            "javadoc": "JavaDoc",
            "javadoclike": "JavaDoc-like",
            "javastacktrace": "Java stack trace",
            "jq": "JQ",
            "jsdoc": "JSDoc",
            "js-extras": "JS Extras",
            "json": "JSON",
            "webmanifest": "Web App Manifest",
            "json5": "JSON5",
            "jsonp": "JSONP",
            "jsstacktrace": "JS stack trace",
            "js-templates": "JS Templates",
            "kts": "Kotlin Script",
            "kt": "Kotlin",
            "kumir": "KuMir (КуМир)",
            "kum": "KuMir (КуМир)",
            "latex": "LaTeX",
            "tex": "TeX",
            "context": "ConTeXt",
            "lilypond": "LilyPond",
            "ly": "LilyPond",
            "emacs": "Lisp",
            "elisp": "Lisp",
            "emacs-lisp": "Lisp",
            "llvm": "LLVM IR",
            "log": "Log file",
            "lolcode": "LOLCODE",
            "magma": "Magma (CAS)",
            "md": "Markdown",
            "markup-templating": "Markup templating",
            "matlab": "MATLAB",
            "maxscript": "MAXScript",
            "mel": "MEL",
            "mongodb": "MongoDB",
            "moon": "MoonScript",
            "n1ql": "N1QL",
            "n4js": "N4JS",
            "n4jsd": "N4JS",
            "nand2tetris-hdl": "Nand To Tetris HDL",
            "naniscript": "Naninovel Script",
            "nani": "Naninovel Script",
            "nasm": "NASM",
            "neon": "NEON",
            "nginx": "nginx",
            "nsis": "NSIS",
            "objectivec": "Objective-C",
            "objc": "Objective-C",
            "ocaml": "OCaml",
            "opencl": "OpenCL",
            "openqasm": "OpenQasm",
            "qasm": "OpenQasm",
            "parigp": "PARI/GP",
            "objectpascal": "Object Pascal",
            "psl": "PATROL Scripting Language",
            "pcaxis": "PC-Axis",
            "px": "PC-Axis",
            "peoplecode": "PeopleCode",
            "pcode": "PeopleCode",
            "php": "PHP",
            "phpdoc": "PHPDoc",
            "php-extras": "PHP Extras",
            "plsql": "PL/SQL",
            "powerquery": "PowerQuery",
            "pq": "PowerQuery",
            "mscript": "PowerQuery",
            "powershell": "PowerShell",
            "promql": "PromQL",
            "properties": ".properties",
            "protobuf": "Protocol Buffers",
            "purebasic": "PureBasic",
            "pbfasm": "PureBasic",
            "purs": "PureScript",
            "py": "Python",
            "qsharp": "Q#",
            "qs": "Q#",
            "q": "Q (kdb+ database)",
            "qml": "QML",
            "rkt": "Racket",
            "cshtml": "Razor C#",
            "razor": "Razor C#",
            "jsx": "React JSX",
            "tsx": "React TSX",
            "renpy": "Ren'py",
            "rpy": "Ren'py",
            "rest": "reST (reStructuredText)",
            "robotframework": "Robot Framework",
            "robot": "Robot Framework",
            "rb": "Ruby",
            "sas": "SAS",
            "sass": "Sass (Sass)",
            "scss": "Sass (Scss)",
            "shell-session": "Shell session",
            "sh-session": "Shell session",
            "shellsession": "Shell session",
            "sml": "SML",
            "smlnj": "SML/NJ",
            "solidity": "Solidity (Ethereum)",
            "sol": "Solidity (Ethereum)",
            "solution-file": "Solution file",
            "sln": "Solution file",
            "soy": "Soy (Closure Template)",
            "sparql": "SPARQL",
            "rq": "SPARQL",
            "splunk-spl": "Splunk SPL",
            "sqf": "SQF: Status Quo Function (Arma 3)",
            "sql": "SQL",
            "iecst": "Structured Text (IEC 61131-3)",
            "systemd": "Systemd configuration file",
            "t4-templating": "T4 templating",
            "t4-cs": "T4 Text Templates (C#)",
            "t4": "T4 Text Templates (C#)",
            "t4-vb": "T4 Text Templates (VB)",
            "tap": "TAP",
            "tt2": "Template Toolkit 2",
            "toml": "TOML",
            "trig": "TriG",
            "ts": "TypeScript",
            "tsconfig": "TSConfig",
            "uscript": "UnrealScript",
            "uc": "UnrealScript",
            "uri": "URI",
            "url": "URL",
            "vbnet": "VB.Net",
            "vhdl": "VHDL",
            "vim": "vim",
            "visual-basic": "Visual Basic",
            "vba": "VBA",
            "vb": "Visual Basic",
            "wasm": "WebAssembly",
            "wiki": "Wiki markup",
            "wolfram": "Wolfram language",
            "nb": "Mathematica Notebook",
            "wl": "Wolfram language",
            "xeoracube": "XeoraCube",
            "xml-doc": "XML doc (.net)",
            "xojo": "Xojo (REALbasic)",
            "xquery": "XQuery",
            "yaml": "YAML",
            "yml": "YAML",
            "yang": "YANG"
        }/*]*/;

        /* eslint-enable */

        Prism.plugins.toolbar.registerButton('show-language', function (env) {
            var pre = env.element.parentNode;
            if (!pre || !/pre/i.test(pre.nodeName)) {
                return;
            }

            /**
             * Tries to guess the name of a language given its id.
             *
             * @param {string} id The language id.
             * @returns {string}
             */
            function guessTitle(id) {
                if (!id) {
                    return id;
                }
                return (id.substring(0, 1).toUpperCase() + id.substring(1)).replace(/s(?=cript)/, 'S');
            }

            var language = pre.getAttribute('data-language') || Languages[env.language] || guessTitle(env.language);

            if (!language) {
                return;
            }
            var element = document.createElement('span');
            element.textContent = language;

            return element;
        });

    }());

</script>
</body>
</html>
