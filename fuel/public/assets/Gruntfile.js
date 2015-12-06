module.exports = function(grunt) {
	//実行時間計測(プラグイン)
	require('time-grunt')(grunt);
	grunt.initConfig({
		//ディレクトリ変数
		dir: {
			src:'src',
			bin:'bin',
			release:'release',
			js: 'js',
			css: 'css',
			img:'img',
			sass:'sass',
			vendor: 'vendor',
			coffeescript: 'coffeescript',
			compile: 'compile',
		},
		/* -------------------------------------
		* sprite(画像　csssprite化)(PC)
		------------------------------------- */
		sprite: {
			all: {
				// src: ["<%= dir.img %>/icon/sprite/*.png","<%= dir.img %>/icon/sprite/*.gif"],
				// destImg: "<%= dir.img %>/icon/sprite.png",
				// destCSS: "<%= dir.sass %>/sprite/sprite.scss",
				// algorithm: 'top-down',
				// cssFormat: 'scss',
				// engine: 'phantomjs'
				src: ["<%= dir.img %>/icon/sprite/*.png","<%= dir.img %>/icon/sprite/*.gif"],
				dest: "<%= dir.img %>/icon/sprite.png",
				destCss: "<%= dir.sass %>/sprite/sprite.scss"
			},
		},
		/* -------------------------------------
		 * css結合・圧縮
		 --------------------------------------- */
		cssmin: {
			// 共通CSS(tmp_common)
			common: {
				src : [
					'<%= dir.css %>/bootstrap.css',
					'<%= dir.css %>/common.css',
					'<%= dir.css %>/ui-lightness/jquery-ui-1.10.4.custom.css',
					'<%= dir.css %>/compile/tmp_common.css'
				],
				dest : '<%= dir.css %>/min_file/tmp_common.css'
			},
			// list CSS
			list: {
				src : [
					'<%= dir.css %>/bootstrap.css',
					'<%= dir.css %>/common.css',
					'<%= dir.css %>/ui-lightness/jquery-ui-1.10.4.custom.css',
					'<%= dir.css %>/compile/list.css'
				],
				dest : '<%= dir.css %>/min_file/list.css'
			}
		},
		/* -------------------------------------
		* ファイル結合の設定(js)
		------------------------------------- */
		concat: {
			// リストページJS
			list: {
				src: [
					//全ページ共通JS
					'<%= dir.js %>/jquery-1.10.2.js',
					'<%= dir.js %>/jquery-ui-1.10.4.custom.js',
					'<%= dir.js %>/convert/all.js',
					'<%= dir.js %>/convert/list.js'
				],
				dest: '<%= dir.js %>/compile/list.js'
			},
			// chartページJS
			chart: {
				src: [
					//全ページ共通JS
					'<%= dir.js %>/jquery-1.10.2.js',
					'<%= dir.js %>/jquery-ui-1.10.4.custom.js',
					'<%= dir.js %>/convert/all.js',
					// '<%= dir.js %>/convert/chart.js'
				],
				dest: '<%= dir.js %>/compile/chart.js'
			},
			// chartnewsページJS
			chartnews: {
				src: [
					//全ページ共通JS
					'<%= dir.js %>/jquery-1.10.2.js',
					'<%= dir.js %>/jquery-ui-1.10.4.custom.js',
					'<%= dir.js %>/convert/all.js',
					// '<%= dir.js %>/convert/chartnews.js'
				],
				dest: '<%= dir.js %>/compile/chartnews.js'
			},
			// newsページJS
			news: {
				src: [
					//全ページ共通JS
					'<%= dir.js %>/jquery-1.10.2.js',
					'<%= dir.js %>/jquery-ui-1.10.4.custom.js',
					'<%= dir.js %>/convert/all.js',
					// '<%= dir.js %>/convert/news.js'
				],
				dest: '<%= dir.js %>/compile/news.js'
			}
		},
		/* -------------------------------------
		* ファイル圧縮の設定(js)
		------------------------------------- */
		uglify: {
			options: {
				banner: '/*! <%= grunt.template.today("dd-mm-yyyy_HH-MM-ss") %> */\n'
			},
			// all
			all: {
				files: {
					"<%= dir.js %>/min_file/list.js" : ["<%= dir.js %>/compile/list.js"],
					"<%= dir.js %>/min_file/chart.js" : ["<%= dir.js %>/compile/chart.js"],
					"<%= dir.js %>/min_file/chartnews.js" : ["<%= dir.js %>/compile/chartnews.js"],
					"<%= dir.js %>/min_file/news.js" : ["<%= dir.js %>/compile/news.js"]
				}
			}
		},
		/* -------------------------------------
		* compass利用(sass)
		------------------------------------- */
		compass: {
			dist: {
				options: {
				config: 'sass/config.rb'
				}
			}
		},
		/* -------------------------------------
		* 監視ファイル指定
		------------------------------------- */
		watch: {
			files: ['sass/*.scss','sass/ownermypage/*.scss','js/coffee/*coffee','js/coffee/*/*coffee'],
			//全ファイル
			tasks: ['compass','cssmin','concat','uglify']
		},
		/*
		* jsパッケージ管理(未使用)
		*/
		bower: {
			install: {
				options: {
					targetDir: '<%= dir.vendor %>',
					//targetDir: './lib',
					layout: 'byType',
					install: true,
					verbose: false,
					cleanTargetDir: true,
					cleanBowerDir: false
				}
			}
		},
		jshint: {
			options: {
				jshintrc:'.jshintrc'
			},
			// 対象ファイルを指定
			all: ['js/add/schedule']
		},
		yuidoc: {
			dist: {
				'name': 'Test Web App',
				'description':'',
				'version':'0.1.0',
				options: {
					paths:['js/'],
					outdir:'docs/'
				}
			}
		},
		//coffeescript
		coffee:{
			compile:{
				files:[{
					expand: true,
					cwd: 'coffeescript/',
					src: ['**/*.coffee'],
					dest: 'js/convert/',
					ext: '.js',
				}],
				options: {
					bare: true
				}
			}
		},
		// 不要なファイルを削除する
		clean: {
			// releaseフォルダ内を削除する
			delete_tmp: {
				src: [
					'<%= dir.js %>/convert/',
					'<%= dir.js %>/<%= dir.compile %>/',
					'<%= dir.css %>/<%= dir.compile %>/'
				]
			},
			styleguide: {
				src: [
					'docs/styledocco'
				]
			}
		},
		styleguide: {
			dist: {
				name: 'Style Guide',
				options: {
					framework: {
						name: 'styledocco'
					},
					preprocessor: 'bundle exec scss --compass'
				},
				files: {
					'../cssdocs/styledocco': 'sass/**/*.scss'
				}
			}
		}
	});

	// ======================================
	// npmタスク ロード
	// ======================================
	// js
	grunt.loadNpmTasks("grunt-contrib-concat");// js結合
	grunt.loadNpmTasks("grunt-contrib-uglify");// js圧縮
	grunt.loadNpmTasks('grunt-bower-task');// bower
	grunt.loadNpmTasks('grunt-contrib-yuidoc');// js doc
	grunt.loadNpmTasks('grunt-contrib-coffee');// coffeescript
	grunt.loadNpmTasks("grunt-contrib-jshint");// JS構文チェック
	// css
	grunt.loadNpmTasks('grunt-contrib-sass');// sass
	grunt.loadNpmTasks("grunt-contrib-compass");// compass
	grunt.loadNpmTasks('grunt-contrib-cssmin');// css圧縮
	grunt.loadNpmTasks('grunt-styleguide');// style doc
	// 画像
	grunt.loadNpmTasks('grunt-spritesmith');// sprite
	// その他
	grunt.loadNpmTasks('grunt-contrib-clean');// ファイル削除
	grunt.loadNpmTasks("grunt-contrib-watch");// watch

	// ======================================
	// タスク定義
	// ======================================
	// css/js全工程
	grunt.registerTask('css_js', ['coffee','compass','cssmin','concat','uglify','clean:delete_tmp']);
	// grunt.registerTask('css_js', ['coffee','compass','cssmin','concat','uglify']);
	// sprite画像生成
	grunt.registerTask('sprite', ['sprite:all']);

	// スタイルガイド生成
	// grunt.registerTask('styleguide_exec', ['clean:styleguide','styleguide']);
	// html バリデーション
	// grunt.registerTask('html',['validation']);
	// grunt.registerTask('default', ['compass','cssmin','concat','uglify','yuidoc']);
	// grunt.registerTask('default', ['compass']);
	// JS構文チェック
	// grunt.registerTask('default', ['jshint']);
	// YUIDoc生成
	// grunt.registerTask('default', ['yuidoc']);
	// bowerインストール(jqueryパッケージ)
	// grunt.registerTask('default', ['bower:install']);
};