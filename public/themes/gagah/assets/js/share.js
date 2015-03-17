
      ADL = {};
      
      (function(namespace) {
        
        function ViralGate() { };
        
        ViralGate.prototype.setDisplay = function(className, value) {
          var els = document.getElementsByClassName(className);          
          for (var i = 0; i < els.length; i++) {
            els[i].style.display = value;
          }          
        };
        
        ViralGate.prototype.lock = function() {
          this.setDisplay('adl-outside-gate', 'block');
          this.setDisplay('adl-inside-gate', 'none');
        };
        
        ViralGate.prototype.unlock = function() {
          this.setDisplay('adl-outside-gate', 'none');
          this.setDisplay('adl-inside-gate', 'block');          
        }
        
        ViralGate.prototype.afterLike = function(event) {
          // event is the URL
          ADL.viralGate.unlock();
        };
        
        ViralGate.prototype.afterPlus = function(data) {
          // data is object with { href: 'http://...', state: 'on' }    
          if (data.state == 'on') {
            ADL.viralGate.unlock();
          }
        };
        
        ViralGate.prototype.afterTweet = function(event) {
          // event.type == 'tweet'
          ADL.viralGate.unlock();
        };
        
        ViralGate.prototype.afterLinkedInShare = function(url) {
          // url is url string
          ADL.viralGate.unlock();
        }; 
        
        namespace.viralGate = new ViralGate(); 
        
      })(ADL);
      
      ADL.viralGate.lock();
      twttr.events.bind('tweet', ADL.viralGate.afterTweet); 
      FB.Event.subscribe('edge.create', ADL.viralGate.afterLike);
      
      // Google callback must be in global namespace
      afterPlus = function(data) {
        ADL.viralGate.afterPlus(data);
      }
    