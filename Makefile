
build: clean lint copy tar

lint:
	vendor/bin/phpcs --standard=./ruleset.xml .

clean:
	rm -rf dist dist.tar.gz

copy:
	mkdir dist
	cp api.php dist
	cp autoload.php dist
	cp config.php dist
	cp index.php dist
	cp -R lib dist

tar:
	tar -zc dist/ | gzip > dist.tar.gz
	
.PHONY: build
