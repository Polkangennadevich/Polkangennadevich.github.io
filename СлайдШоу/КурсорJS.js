

var nDots = 9; // Число элементов шлейфа +1
var Xbpos = 0;
var Ybpos = 0;

var DELTAT = .01;
var SEGLEN = 10;
var SPRINGK = 10;
var MASS = 1;
var XGRAVITY = 0;
var YGRAVITY = 50;
var RESISTANCE = 10;
var STOPVEL = 0.1;
var STOPACC = 0.1;
var DOTSIZE = 11;
var BOUNCE = 0.75;
var followmouse = true;
var dots = new Array();

init();

function init()
{
   var i = 0;
   for (i = 0; i < nDots; i++) 
   {
      dots[i] = new dot(i);
   }
    
   for (i = 0; i < nDots; i++) 
   {
      dots[i].obj.left = dots[i].X + "px";
      dots[i].obj.top = dots[i].Y + "px";
   }
    
   setTimeout("startanimate()", 10);
}

function dot(i) 
{
   this.X = Xbpos;
   this.Y = Ybpos;
   this.dx = 0;
   this.dy = 0;
   
   var id = "adot" + i;
   var elem = document.getElementById(id);
   this.obj = elem.style;
}

function startanimate() 
{	
   setInterval("animate()", 20);
}

function setInitPositions(dots)
{
   var startloc = document.all.tags("Li");
   var i = 0;
   for (i = 0; i < startloc.length && i < (nDots - 1); i++) 
   {
      dots[i+1].X = startloc[i].offsetLeft + startloc[i].offsetParent.offsetLeft - DOTSIZE;
      dots[i+1].Y = startloc[i].offsetTop + startloc[i].offsetParent.offsetTop + 2*DOTSIZE;
   }
   dots[0].X = dots[1].X;
   dots[0].Y = dots[1].Y - SEGLEN;
}

function MoveHandler(e)
{
   if (window.event)
   {
      Xbpos = window.event.x + document.body.scrollLeft;
      Ybpos = window.event.y + document.body.scrollTop;	
   }
   else
   {
      Xbpos = e.pageX;
      Ybpos = e.pageY;	  
      return true; 
   }
}

document.onmousemove = MoveHandler;

function vec(X, Y)
{
   this.X = X;
   this.Y = Y;
}

function springForce(i, j, spring)
{
   var dx = (dots[i].X - dots[j].X);
   var dy = (dots[i].Y - dots[j].Y);
   var len = Math.sqrt(dx*dx + dy*dy);
   if (len > SEGLEN) 
   {
      var springF = SPRINGK * (len - SEGLEN);
      spring.X += (dx / len) * springF;
      spring.Y += (dy / len) * springF;
   }
}

function animate() 
{	
   var start = 0;
   if (followmouse) 
   {
      dots[0].X = Xbpos;
      dots[0].Y = Ybpos;	
      start = 1;
   }
    
   for (i = start ; i < nDots; i++ ) 
   {
      var spring = new vec(0, 0);
      if (i > 0) 
      {
         springForce(i-1, i, spring);
      }
      if (i < (nDots - 1)) 
      {
         springForce(i+1, i, spring);
      }
        
      var resist = new vec(-dots[i].dx * RESISTANCE, -dots[i].dy * RESISTANCE);
      var accel = new vec((spring.X + resist.X)/MASS + XGRAVITY, (spring.Y + resist.Y)/ MASS + YGRAVITY);
        
      dots[i].dx += (DELTAT * accel.X);
      dots[i].dy += (DELTAT * accel.Y);
        
      if (Math.abs(dots[i].dx) < STOPVEL &&  
          Math.abs(dots[i].dy) < STOPVEL &&
          Math.abs(accel.X) < STOPACC &&
          Math.abs(accel.Y) < STOPACC) 
      {
         dots[i].dx = 0;
         dots[i].dy = 0;
      }
      dots[i].X += dots[i].dx;
      dots[i].Y += dots[i].dy;
        
      var height, width;
    
      if (typeof window.innerWidth != 'undefined')
      {
         width = window.innerWidth + window.pageXOffset;
         height = window.innerHeight + window.pageYOffset;
      }
      else 
      if (typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0)
      {
         width = document.documentElement.clientWidth + document.body.scrollLeft;
         height = document.documentElement.clientHeight + document.body.scrollTop;
      }
      else
      {
         width = document.getElementsByTagName('body')[0].clientWidth + document.body.scrollLeft;
         height = document.getElementsByTagName('body')[0].clientHeight + document.body.scrollTop;
      }
      
      if (dots[i].Y >=  height - DOTSIZE - 1) 
      {
         if (dots[i].dy > 0) 
         {
            dots[i].dy = BOUNCE * -dots[i].dy;
         }
         dots[i].Y = height - DOTSIZE - 1;
      }
      if (dots[i].X >= width - DOTSIZE) 
      {
         if (dots[i].dx > 0) 
         {
            dots[i].dx = BOUNCE * -dots[i].dx;
         }
         dots[i].X = width - DOTSIZE - 1;
      }
      if (dots[i].X < 0) 
      {
         if (dots[i].dx < 0) 
         {
            dots[i].dx = BOUNCE * -dots[i].dx;
         }
         dots[i].X = 0;
      }
      dots[i].obj.left = dots[i].X + "px";
      dots[i].obj.top =  dots[i].Y + "px";		
   }
}


